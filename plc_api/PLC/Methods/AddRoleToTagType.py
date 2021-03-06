from PLC.Faults import *
from PLC.Method import Method
from PLC.Auth import Auth
from PLC.Parameter import Parameter, Mixed
from PLC.TagTypes import TagType, TagTypes
from PLC.Roles import Role, Roles

class AddRoleToTagType(Method):
    """
    Add the specified role to the tagtype so that 
    users with that role can tweak the tag.

    Only admins can call this method

    Returns 1 if successful, faults otherwise.
    """

    roles = ['admin']

    accepts = [
        Auth(),
        Mixed(Role.fields['role_id'],
              Role.fields['name']),
        Mixed(TagType.fields['tag_type_id'],
              TagType.fields['tagname']),
        ]

    returns = Parameter(int, '1 if successful')

    def call(self, auth, role_id_or_name, tag_type_id_or_tagname):
        # Get role
        roles = Roles(self.api, [role_id_or_name])
        if not roles:
            raise PLCInvalidArgument, "Invalid role '%s'" % unicode(role_id_or_name)
        role = roles[0]

        # Get subject tag type
        tag_types = TagTypes(self.api, [tag_type_id_or_tagname])
        if not tag_types:
            raise PLCInvalidArgument, "No such tag type"
        tag_type = tag_types[0]

        # Authenticated function
        assert self.caller is not None

        # Only admins 
        if 'admin' not in self.caller['roles']: 
            raise PLCInvalidArgument, "Not allowed to grant that role"

        if role['role_id'] not in tag_type['role_ids']:
            tag_type.add_role(role)

        self.event_objects = {'TagType': [tag_type['tag_type_id']],
                              'Role': [role['role_id']]}
        self.message = "Role %d added to tag_type %d" % \
            (role['role_id'], tag_type['tag_type_id'])

        return 1
