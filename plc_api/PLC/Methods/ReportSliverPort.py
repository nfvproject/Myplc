"""
    created by lihaitao
"""

from PLC.Faults import *
from PLC.Method import Method
from PLC.Parameter import Parameter, Mixed
from PLC.Filter import Filter
from PLC.Auth import Auth, BootAuth, SessionAuth
from PLC.SliverInfo import SliverInfo,SliverInfos

can_update = ['sliver_port']

class ReportSliverPort(Method):
    """
        report sliver port
    """
    #roles = ['node', 'admin']
    roles = ['admin', 'pi', 'user', 'tech', 'node', 'anonymous']

    accepts = [
        Mixed(BootAuth(), SessionAuth(), Auth()),
        {'sliver_port': SliverInfo.fields['sliver_port'],
        },
        Mixed([Mixed(SliverInfo.fields['node_id'],     # modified by lihaitao
                     SliverInfo.fields['slice_id'])],
              Parameter(int,"node_id"),
              Parameter(int,"slice_id"),
              Filter(SliverInfo.fields)),
        #{'node_id':SliverInfo.fields['node_id'],'slice_id':SliverInfo.fields['slice_id'],}
        ]

    returns = Parameter(int, '1 if successful')

    def call(self, auth, report_fields = None, sliver_filter = None):
        """
        if not isinstance(self.caller, SliverInfo):
            # check admin
            if 'admin' not in self.caller['roles']:
                raise PLCPermissionDenied, "Not allowed to update sliver port"

            sliverInfos = SliverInfos(self.api, sliver_filter)
            if not sliverInfos:
                raise PLCInvalidArgument, "No such sliver"
        else:
            sliverInfos = [self.caller]
        """
        sliverInfos = SliverInfos(self.api, sliver_filter)
        if not sliverInfos:
            raise PLCInvalidArgument, "No such sliver"

        sliver = sliverInfos[0]
        # avoid logging this even too often
        # avoid logging occurrences where sliver port does not change
        former_port = None
        if 'sliver_port' in sliver: former_port = sliver['sliver_port']

        #sliver.update_last_contact()
        for field in can_update:
            if field in report_fields:
                #print sliver
                #print report_fields[field]
                sliver.update({field : report_fields[field]})

        #sliver.sync(commit=True)
        
        # skip logging in this case
        if former_port and 'sliver_port' in sliver and sliver['sliver_port'] == former_port:
            pass
        else:
            # handle the 'sliver_port' key
            message = "sliver port " + str(sliver['node_id']) + "-" + str(sliver['slice_id']) + ":"
            if 'sliver_port' in report_fields:
                message += str(former_port) + "->" + str(report_fields['sliver_port'])
            message += ", ".join(  [ k + "->" + v for (k,v) in report_fields.items() if k not in ['sliver_port'] ] )
        
        return 1
