#
# Thierry Parmentelat - INRIA
#
from types import StringTypes
try:
    set
except NameError:
    from sets import Set
    set = Set

import time

from PLC.Faults import *
from PLC.Parameter import Parameter, Mixed, python_type

class Filter(Parameter, dict):
    """
    A type of parameter that represents a filter on one or more
    columns of a database table.
    Special features provide support for negation, upper and lower bounds,
    sorting and clipping and more...


    fields should be a dictionary of field names and types.
    As of PLCAPI-4.3-26, we provide support for filtering on
    sequence types as well, with the special '&' and '|' modifiers.
    example : fields = {'node_id': Parameter(int, "Node identifier"),
                        'hostname': Parameter(int, "Fully qualified hostname", max = 255),
                        ...}


    filter should be a dictionary of field names and values
    representing  the criteria for filtering.
    example : filter = { 'hostname' : '*.edu' , site_id : [34,54] }


    Special features:

    * a field starting with the ~ character means negation.
    example :  filter = { '~peer_id' : None }

    * a field starting with < [  ] or > means lower than or greater than
      < > uses strict comparison
      [ ] is for using <= or >= instead
    example :  filter = { ']event_id' : 2305 }
    example :  filter = { '>time' : 1178531418 }
      in this example the integer value denotes a unix timestamp

    * if a value is a sequence type, then it should represent
      a list of possible values for that field
    example : filter = { 'node_id' : [12,34,56] }

    * a (string) value containing either a * or a % character is
      treated as a (sql) pattern; * are replaced with % that is the
      SQL wildcard character.
    example :  filter = { 'hostname' : '*.jp' }

    * a field starting with '&' or '|' should refer to a sequence type
      the semantics is then that the object value (expected to be a list)
      should contain all (&) or any (|) value specified in the corresponding
      filter value. See other examples below.
    example : filter = { '|role_ids' : [ 20, 40 ] }
    example : filter = { '|roles' : ['tech', 'pi'] }
    example : filter = { '&roles' : ['admin', 'tech'] }
    example : filter = { '&roles' : 'tech' }

    * the filter's keys starting with '-' are special and relate to sorting and clipping
      * '-SORT' : a field name, or an ordered list of field names that are used for sorting
        these fields may start with + (default) or - for denoting increasing or decreasing order
    example : filter = { '-SORT' : [ '+node_id', '-hostname' ] }
      * '-OFFSET' : the number of first rows to be ommitted
      * '-LIMIT' : the amount of rows to be returned
    example : filter = { '-OFFSET' : 100, '-LIMIT':25}

    * similarly the two special keys below allow to change the semantics of multi-keys filters
      * '-AND' : select rows that match ALL the criteria (default)
      * '-OR'  : select rows that match ANY criteria
      The value attached to these keys is ignored. 
      Please note however that because a Filter is a dict, you cannot provide two criteria on a given key.
      

    Here are a few realistic examples

    GetNodes ( { 'node_type' : 'regular' , 'hostname' : '*.edu' ,
                 '-SORT' : 'hostname' , '-OFFSET' : 30 , '-LIMIT' : 25 } )
      would return regular (usual) nodes matching '*.edu' in alphabetical order from 31th to 55th

    GetNodes ( { '~peer_id' : None } )
      returns the foreign nodes - that have an integer peer_id

    GetPersons ( { '|role_ids' : [ 20 , 40] } )
      would return all persons that have either pi (20) or tech (40) roles

    GetPersons ( { '&role_ids' : 10 } )
    GetPersons ( { '&role_ids' : 10 } )
    GetPersons ( { '|role_ids' : [ 10 ] } )
    GetPersons ( { '|role_ids' : [ 10 ] } )
      all 4 forms are equivalent and would return all admin users in the system
    """

    debug=False
#    debug=True

    def __init__(self, fields = {}, filter = {}, doc = "Attribute filter"):
        # Store the filter in our dict instance
        dict.__init__(self, filter)

        # Declare ourselves as a type of parameter that can take
        # either a value or a list of values for each of the specified
        # fields.
        self.fields = dict ( [ ( field, Mixed (expected, [expected]))
                                 for (field,expected) in fields.iteritems() ] )

        # Null filter means no filter
        Parameter.__init__(self, self.fields, doc = doc, nullok = True)

    def sql(self, api, join_with = "AND"):
        """
        Returns a SQL conditional that represents this filter.
        """

        if self.has_key('-AND'):
            del self['-AND']
            join_with='AND'
        if self.has_key('-OR'):
            del self['-OR']
            join_with='OR'

        self.join_with=join_with

        # So that we always return something
        if join_with == "AND":
            conditionals = ["True"]
        elif join_with == "OR":
            conditionals = ["False"]
        else:
            assert join_with in ("AND", "OR")

        # init
        sorts = []
        clips = []

        for field, value in self.iteritems():
            # handle negation, numeric comparisons
            # simple, 1-depth only mechanism

            modifiers={'~' : False,
                       '<' : False, '>' : False,
                       '[' : False, ']' : False,
                       '-' : False,
                       '&' : False, '|' : False,
                       }
            def check_modifiers(field):
                if field[0] in modifiers.keys():
                    modifiers[field[0]] = True
                    field = field[1:]
                    return check_modifiers(field)
                return field
            field = check_modifiers(field)

            # filter on fields
            if not modifiers['-']:
                if field not in self.fields:
                    raise PLCInvalidArgument, "Invalid filter field '%s'" % field

                # handling array fileds always as compound values
                if modifiers['&'] or modifiers['|']:
                    if not isinstance(value, (list, tuple, set)):
                        value = [value,]

                def get_op_and_val(value):
                    if value is None:
                        operator = "IS"
                        value = "NULL"
                    elif isinstance(value, StringTypes) and \
                            (value.find("*") > -1 or value.find("%") > -1):
                        operator = "ILIKE"
                        # insert *** in pattern instead of either * or %
                        # we dont use % as requests are likely to %-expansion later on
                        # actual replacement to % done in PostgreSQL.py
                        value = value.replace ('*','***')
                        value = value.replace ('%','***')
                        value = str(api.db.quote(value))
                    else:
                        operator = "="
                        if modifiers['<']:
                            operator='<'
                        if modifiers['>']:
                            operator='>'
                        if modifiers['[']:
                            operator='<='
                        if modifiers[']']:
                            operator='>='
                        value = str(api.db.quote(value))
                    return (operator, value)

                if isinstance(value, (list, tuple, set)):
                    # handling filters like '~slice_id':[]
                    # this should return true, as it's the opposite of 'slice_id':[] which is false
                    # prior to this fix, 'slice_id':[] would have returned ``slice_id IN (NULL) '' which is unknown
                    # so it worked by coincidence, but the negation '~slice_ids':[] would return false too
                    if not value:
                        if modifiers['&'] or modifiers['|']:
                            operator = "="
                            value = "'{}'"
                        else:
                            field=""
                            operator=""
                            value = "FALSE"
                        clause = "%s %s %s" % (field, operator, value)
                    else:
                        vals = {}
                        for val in value:
                            base_op, val = get_op_and_val(val)
                            if base_op in vals:
                                vals[base_op].append(val)
                            else:
                                vals[base_op] = [val]
                        subclauses = []
                        for operator in vals.keys():
                            if operator == '=':
                                if modifiers['&']:
                                    subclauses.append("(%s @> ARRAY[%s])" % (field, ",".join(vals[operator])))
                                elif modifiers['|']:
                                    subclauses.append("(%s && ARRAY[%s])" % (field, ",".join(vals[operator])))
                                else:
                                    subclauses.append("(%s IN (%s))" % (field, ",".join(vals[operator])))
                            elif operator == 'IS':
                                subclauses.append("(%s IS NULL)" % field)
                            else:
                                for value in vals[operator]:
                                    subclauses.append("(%s %s %s)" % (field, operator, value))
                        clause = "(" + " OR ".join(subclauses) + ")"
                else:
                    operator, value = get_op_and_val(value)

                    clause = "%s %s %s" % (field, operator, value)

                if modifiers['~']:
                    clause = " ( NOT %s ) " % (clause)

                conditionals.append(clause)
            # sorting and clipping
            else:
                if field not in ('SORT','OFFSET','LIMIT'):
                    raise PLCInvalidArgument, "Invalid filter, unknown sort and clip field %r"%field
                # sorting
                if field == 'SORT':
                    if not isinstance(value,(list,tuple,set)):
                        value=[value]
                    for field in value:
                        order = 'ASC'
                        if field[0] == '+':
                            field = field[1:]
                        elif field[0] == '-':
                            field = field[1:]
                            order = 'DESC'
                        if field not in self.fields:
                            raise PLCInvalidArgument, "Invalid field %r in SORT filter"%field
                        sorts.append("%s %s"%(field,order))
                # clipping
                elif field == 'OFFSET':
                    clips.append("OFFSET %d"%value)
                # clipping continued
                elif field == 'LIMIT' :
                    clips.append("LIMIT %d"%value)

        where_part = (" %s " % join_with).join(conditionals)
        clip_part = ""
        if sorts:
            clip_part += " ORDER BY " + ",".join(sorts)
        if clips:
            clip_part += " " + " ".join(clips)
        if Filter.debug: print 'Filter.sql: where_part=',where_part,'clip_part',clip_part
        return (where_part,clip_part)
