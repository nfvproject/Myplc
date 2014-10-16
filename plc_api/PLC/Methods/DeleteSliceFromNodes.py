from PLC.Faults import *
from PLC.Method import Method
from PLC.Parameter import Parameter, Mixed
from PLC.Nodes import Node, Nodes
from PLC.Slices import Slice, Slices
from PLC.Auth import Auth
#wangyang
from PLC.SliceTags import SliceTag, SliceTags
from PLC.Methods.DeleteSliceTag import DeleteSliceTag
class DeleteSliceFromNodes(Method):
    """
    Deletes the specified slice from the specified nodes. If the slice is
    not associated with a node, no errors are returned.

    Returns 1 if successful, faults otherwise.
    """

    roles = ['admin', 'pi', 'user']

    accepts = [
        Auth(),
       Mixed(Slice.fields['slice_id'],
              Slice.fields['name']),
        [Mixed(Node.fields['node_id'],
               Node.fields['hostname'])]
        ]

    returns = Parameter(int, '1 if successful')

    def call(self, auth, slice_id_or_name, node_id_or_hostname_list):
        # Get slice information
        slices = Slices(self.api, [slice_id_or_name])
        if not slices:
            raise PLCInvalidArgument, "No such slice"
        slice = slices[0]

        if slice['peer_id'] is not None:
            raise PLCInvalidArgument, "Not a local slice"

        if 'admin' not in self.caller['roles']:
            if self.caller['person_id'] in slice['person_ids']:
                pass
            elif 'pi' not in self.caller['roles']:
                raise PLCPermissionDenied, "Not a member of the specified slice"
            elif slice['site_id'] not in self.caller['site_ids']:
                raise PLCPermissionDenied, "Specified slice not associated with any of your sites"

        # Remove slice from all nodes found
        #wangyang
        # Get specified nodes
        nodes = Nodes(self.api, node_id_or_hostname_list)
        for node in nodes:
            if slice['peer_id'] is not None and node['peer_id'] is not None:
                raise PLCPermissionDenied, "Not allowed to remove peer slice from peer node"
            if slice['slice_id'] in node['slice_ids']:
                #wangyang,delete tag
                if node['model'] == 'pearl':
                    print "node is %d"%node['node_id']
                    slice_tags = SliceTags(self.api, {'slice_id':slice['slice_id'],'node_id':node['node_id']})
                    print "slice_tag is %s"%slice_tags
                    if not slice_tags:
                        continue
                    for slice_tag in slice_tags:
                        if slice_tag['tag_type_id'] == 116:
                            DeleteSliceTag(self.api).__call__(auth,slice_tag['slice_tag_id'])
                        if slice_tag['tag_type_id'] == 117:
                            DeleteSliceTag(self.api).__call__(auth,slice_tag['slice_tag_id'])
                slice.remove_node(node, commit = False)
        slice.sync()

        self.event_objects = {'Node': [node['node_id'] for node in nodes],
                              'Slice': [slice['slice_id']]}

        return 1
