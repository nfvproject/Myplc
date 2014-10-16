
from PLC.Faults import *
from PLC.Method import Method
from PLC.Parameter import Parameter, Mixed
from PLC.Filter import Filter
from PLC.Nodes import Node, Nodes
from PLC.Persons import Person, Persons
from PLC.Auth import Auth
from PLC.SliverInfo import SliverInfo,SliverInfos
class GetSliverInfo(Method):
   '''
   GetSliverInfo by node_id and slice_id
   ''' 

   roles = ['admin', 'pi', 'user', 'tech', 'node', 'anonymous']
   accepts = [
         Auth(), 
         Mixed([Mixed(SliverInfo.fields['node_id'],     # modified by lihaitao
                      SliverInfo.fields['slice_id'])],
              Parameter(int,"node_id"),
              Parameter(int,"slice_id"),
              Filter(SliverInfo.fields)),
         Parameter([str], "List of fields to return", nullok = True),
        ]
   returns = [SliverInfo.fields]
   def call(self, auth, SliverInfo_filter = None, return_fields = None):
        # Get sliver information
        sliverinfos = SliverInfos(self.api, SliverInfo_filter, return_fields)
        return sliverinfos
