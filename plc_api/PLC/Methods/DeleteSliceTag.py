#
# Thierry Parmentelat - INRIA
#
from PLC.Faults import *
from PLC.Method import Method
from PLC.Parameter import Parameter, Mixed
from PLC.Auth import Auth

from PLC.TagTypes import TagTypes, TagType
from PLC.Nodes import Node, Nodes
from PLC.Slices import Slice, Slices
from PLC.SliceTags import SliceTag, SliceTags

# need to import so the core classes get decorated with caller_may_write_tag
from PLC.AuthorizeHelpers import AuthorizeHelpers
#wangyang
from PLC.GetPearl import GetPearl
class DeleteSliceTag(Method):
    """
    Deletes the specified slice or sliver attribute.

    Attributes may require the caller to have a particular role in
    order to be deleted. Users may only delete attributes of
    slices or slivers of which they are members. PIs may only delete
    attributes of slices or slivers at their sites, or of which they
    are members. Admins may delete attributes of any slice or sliver.

    Returns 1 if successful, faults otherwise.
    """

    roles = ['admin', 'pi', 'user', 'tech']

    accepts = [
        Auth(),
        SliceTag.fields['slice_tag_id']
        ]

    returns = Parameter(int, '1 if successful')

    def call(self, auth, slice_tag_id):
        slice_tags = SliceTags(self.api, [slice_tag_id])
        if not slice_tags:
            raise PLCInvalidArgument, "No such slice attribute"
        slice_tag = slice_tags[0]

        tag_type_id = slice_tag['tag_type_id']
        tag_type = TagTypes (self.api,[tag_type_id])[0]
        slices = Slices(self.api, [slice_tag['slice_id']])
        if not slices:
            raise PLCInvalidArgument, "No such slice %d"%slice_tag['slice_id']
        slice = slices[0]

        assert slice_tag['slice_tag_id'] in slice['slice_tag_ids']
        #wangyang,if this is a vlanid,vmac or vip
        #wangyang,if this tag is sliver_mac,get value from global
        Pearl = GetPearl()
        if tag_type['tag_type_id'] == 116:
                 #here we should call function "DeletePearlMac(slice_tag['value'])"
                 Pearl.FreeVip(Pearl,slice['slice_id'],slice_tag['node_id'])
        #wangyang,if this tag is sliver_ip,get value from global
        if tag_type['tag_type_id'] == 117:
            #wangyang,if this tag specify a node,get value;else return error
                 #here we should call function "DeletePearlIp(slice_tag['value'])"
        #wangyang,if this tag is vsys_vnet,get value from global
                 Pearl.FreeVmac(Pearl,slice['slice_id'],slice_tag['node_id'])
        if tag_type['tag_type_id'] == 64:
            #wangyang,if this tag specify a node,return error;else get value
                 #here we should call function "DeletePearlValnid(slice_tag['value'])"
                 Pearl.FreeVlanid(Pearl,slice['slice_id'])
        # check authorizations
        node_id_or_hostname=slice_tag['node_id']
        nodegroup_id_or_name=slice_tag['nodegroup_id']
        slice.caller_may_write_tag(self.api,self.caller,tag_type,node_id_or_hostname,nodegroup_id_or_name)

        slice_tag.delete()
        self.event_objects = {'SliceTag': [slice_tag['slice_tag_id']]}

        return 1
