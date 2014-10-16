
# Functions for interacting with the slice_node table in the database
#
# Xiaohui Wang
#

from types import StringTypes
import re

from PLC.Faults import *
from PLC.Parameter import Parameter, Mixed
from PLC.Filter import Filter
from PLC.Debug import profile
from PLC.Table import Row, Table

class SliverInfo(Row):
    #Representation of a row in the slice_node table. To use, optionally
    #instantiate with a dict of values. Update as you would a
    #dict. Commit to the database with sync().

    table_name = 'slice_node'
    primary_key = 'node_id','slice_id'
    #primary_key = 'node_id'
    join_tables = [  'slice_tag','node_tag',  'pcu_node',  ]
    fields = {
        'node_id': Parameter(int, "Node identifier"),
        'slice_id': Parameter(int, "Slice on this node "),
        'sliver_state': Parameter(str, "sliver state", max = 20),
        #'sliver_port': Parameter(str, "sliver port", max = 20),
        'sliver_port': Parameter(int, "sliver port"),
        }
    related_fields = {
        'nodes': [Mixed(Parameter(int, "node identifier"),
                         Parameter(str, "hostname"))],
        'slices': [Mixed(Parameter(int, "Slice identifier"),
                         Parameter(str, "Slice name"))],
        }

    def update(self, sliver):
        assert 'node_id' in self
        assert 'slice_id' in self
        assert self.table_name

        col_name = 'sliver_port'
        #print self
        #print sliver
        #print self.table_name
        self.api.db.do("UPDATE %s SET %s = %s" % (self.table_name, col_name, str(sliver[col_name])) + \
                        " WHERE node_id = %d AND slice_id = %d " % (self['node_id'], self['slice_id']) )
        self.api.db.commit()

class SliverInfos(Table):
    
   # Representation of row(s) from the slive_node table in the
   # database.
      def __init__(self, api, sliver_filter = None, columns = None):
        Table.__init__(self, api, SliverInfo, columns)
        sql = "SELECT %s FROM slice_node" % \
              (", ".join(self.columns.keys()))
        if sliver_filter is not None:
            if isinstance (sliver_filter, (int, long)):
                sliver_filter = Filter(SliverInfo.fields, {'node_id':sliver_filter})
                sql += " WHERE (%s) %s" % sliver_filter.sql(api, "AND")
            elif isinstance(sliver_filter, dict):
                sliver_filter = Filter(SliverInfo.fields, sliver_filter)
                sql += " WHERE (%s) %s" % sliver_filter.sql(api, "AND")
            else:
                raise PLCInvalidArgument, "Wrong node filter %r"% sliver_filter
        self.selectall(sql)

