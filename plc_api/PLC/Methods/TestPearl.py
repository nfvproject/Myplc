#
# Thierry Parmentelat - INRIA
#
from PLC.Faults import *
from PLC.Method import Method
from PLC.Parameter import Parameter, Mixed
from PLC.Auth import Auth

from PLC.TagTypes import TagTypes, TagType
from PLC.Nodes import Node
from PLC.Slices import Slice, Slices
from PLC.SliceTags import SliceTag, SliceTags
from PLC.InitScripts import InitScript, InitScripts

from PLC.AuthorizeHelpers import AuthorizeHelpers

# need to import so the core classes get decorated with caller_may_write_tag
from PLC.AuthorizeHelpers import AuthorizeHelpers
#wangyang import logger
from PLC.GetPearl import GetPearl
class TestPearl(Method):
    """
    Updates the value of an existing slice or sliver attribute.

    Users may only update attributes of slices or slivers of which
    they are members. PIs may only update attributes of slices or
    slivers at their sites, or of which they are members. Admins may
    update attributes of any slice or sliver.

    Returns 1 if successful, faults otherwise.
    """
    fields = {
        'gettype': Parameter(str, ""),
        'slice_id': Parameter(int, ""),
        'node_id': Parameter(int, ""),
        }
    roles = ['admin', 'pi', 'user', 'node']

    accepts = [
        Auth(),
        fields['gettype'],
        Mixed(fields['slice_id']),
        Mixed(fields['node_id']),
        ]

    returns = Parameter(int, '1 if successful')

    def call(self, auth, gettype,slice_id,node_id=None):
        Pearl = GetPearl()
        va = 'nothing'
        if gettype == 'getvip':
            #va = Pearl.GetPearlVip(Pearl,slice_id,node_id)
            va = GetPearl.GetPearlVip(slice_id,node_id)
        if gettype == 'getvmac':
            va = Pearl.GetPearlVmac(Pearl,slice_id,node_id)
        if gettype == 'getvlanid':
            va = Pearl.GetPearlVlanid(Pearl,slice_id)
        if gettype == 'free':
            va = Pearl.FreeVip(Pearl,slice_id,node_id)
            va = Pearl.FreeVmac(Pearl,slice_id,node_id)
        if gettype == 'freevlanid':
            va = Pearl.FreeVlanid(Pearl,slice_id)
        return va
