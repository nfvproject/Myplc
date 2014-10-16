from PLC.Faults import *
from PLC.Method import Method
from PLC.Parameter import Parameter, Mixed
from PLC.Nodes import Node, Nodes
from PLC.Slices import Slice, Slices
from PLC.Persons import Person, Persons
from PLC.Auth import Auth
#wangyang
from PLC.Methods.AddSliceTag import AddSliceTag

class AddSliceToNodes(Method):
    """
    Adds the specified slice to the specified nodes. Nodes may be
    either local or foreign nodes.

    If the slice is already associated with a node, no errors are
    returned.

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
            raise PLCInvalidArgument, "No such slice %r"%slice_id_or_name
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

        # Get specified nodes, add them to the slice
        nodes = Nodes(self.api, node_id_or_hostname_list, 
                      ['node_id', 'hostname', 'model','slice_ids', 'slice_ids_whitelist', 'site_id'])
        newnode = []
        for node in nodes:
            # check the slice whitelist on each node first
            # allow users at site to add node to slice, ignoring whitelist
            if node['slice_ids_whitelist'] and \
               slice['slice_id'] not in node['slice_ids_whitelist'] and \
               not set(self.caller['site_ids']).intersection([node['site_id']]):
                raise PLCInvalidArgument, "%s is not allowed on %s (not on the whitelist)" % \
                  (slice['name'], node['hostname'])
                      
            if slice['slice_id'] not in node['slice_ids']:
                slice.add_node(node, commit = False)
                newnode.append(node)
        slice.sync()

        nodeids = [node['node_id'] for node in nodes]
        self.event_objects = {'Node': nodeids,
                              'Slice': [slice['slice_id']]}
        self.message = 'Slice %d added to nodes %s' % (slice['slice_id'], nodeids)
        #wangyang
        print "slice_id is%d"%slice['slice_id']
        print "newnode is %s"%newnode
        
        for node in newnode:
           #wangyang,
            print "node mudlue is %s"%node['model']
            if node['model'] == 'pearl':
                print "node is is %d"%node['node_id'] 
                
                AddSliceTag(self.api).__call__(auth,slice['slice_id'],116,'fault',node['node_id'])
                
                AddSliceTag(self.api).__call__(auth,slice['slice_id'],117,'fault',node['node_id'])
        #        #AddSliceTag(self.api).__call__(auth,slice['slice_id'],'vsys_vnet','fault',node['hostname'])
        return 1
