<?php
require_once 'plc_drupal.php';
drupal_set_title("Node Manager API Documentation (lxc)");
?>
<DIV
CLASS="BOOK"
><A
NAME="AEN1"
></A
><DIV
CLASS="TITLEPAGE"
><H1
CLASS="title"
><A
NAME="AEN2"
>Ceni Node Manager API Documentation</A
></H1
><HR></DIV
><DIV
CLASS="TOC"
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="#Introduction"
>Introduction</A
></DT
><DD
><DL
><DT
><A
HREF="#Authentication"
>Authentication</A
></DT
><DT
><A
HREF="#Delegation"
>Delegation</A
></DT
><DT
><A
HREF="#Connection"
>Connection</A
></DT
><DT
><A
HREF="#Example"
>An Example using the PLC and NM API</A
></DT
></DL
></DD
><DT
><A
HREF="#Methods"
>Ceni API Methods</A
></DT
></DL
></DIV
><DIV
CLASS="chapter"
><HR><H1
><A
NAME="Introduction"
></A
>Introduction</H1
><P
>The Ceni Node Manager API (NMAPI) is the interface through
    which the slices access the Node API.</P
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="Authentication"
>Authentication</A
></H2
><P
>Authentication for NM operations is based on the identity of the
	  connecting slice.  For slices whose roles are defined as
	  'nm-controller', the target slice must be listed delegated and as
	  controlled by the calling slice.</P
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="Delegation"
>Delegation</A
></H2
><P
> None </P
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="Connection"
>Connection</A
></H2
><P
>The NM XMLRPC server listens locally on every Ceni node at http://localhost:812.</P
><P
>The NM XMLRPC server can be accessed remotely using an SSH connection through the nm-controller account.  Rather than a standard shell, a special command is run that forwards all standard input to the local XMLRPC server, essentially XML-RPC over ssh.</P
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="Example"
>An Example using the PLC and NM API</A
></H2
><P
>The nm-controller slice is given a stub account such that it can
	  be accessed over ssh.  So rather than logging into NM server listens
	  locally on every Ceni node at http://localhost:812.
	  
	  </P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;controller_slice_fields = {'name'      : 'princeton_mycontroller',
                           'instantiation' : 'nm-controller',
                           'url'           : 'http://www.yourhost.com', 
                           'description'   : 'a brief description of this slice.', }
controller_slice_id = api.AddSlice(plauth, controller_slice_fields)
      </PRE
></TD
></TR
></TABLE
><P
>After this, the controller owner, should both add users and nodes to
	this slice.  As well, the controller slice is created using the standard
	Ceni and NM mechanism.  So, wait at least 15 minutes before attempting 
	to access the controller slice on any node.</P
><P
> Subsequently, slices that will be delegated to this controller will
	be registered at PLC.  An example follows.
	</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;delegated_slice_fields = {'name'        : 'anothersite_mydelegated',
                        'instantiation' : 'delegated',
                        'url'           : 'http://www.yourhost.com', 
                        'description'   : 'a brief description of this slice.', }
delegated_slice_id = api.AddSlice(plauth, delegated_slice_fields)

# Get ticket for this slice.
ticket = api.GetSliceTicket(plauth, "princetondsl_solteszdelegated")
	</PRE
></TD
></TR
></TABLE
><P
>After the slice is registered with PLC, and your application has the
	Ticket, the last step is to redeem the ticket by presenting it to the NM
	through the nm-controller account.  The following code formats the message
	correctly.</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;# generate an XMLRPC request.
print xmlrpclib.dumps((ticket,), 'Ticket')
	</PRE
></TD
></TR
></TABLE
><P
>Finally, this message must be sent to the NM using the controller
	account.  It should be possible to create a program that creates the ssh
	connection or to use a library that does this automatically such as: 
	<A
HREF="http://cheeseshop.python.org/pypi/pyXMLRPCssh/1.0-0"
TARGET="_top"
>pyXMLRPCssh</A
>
	</P
><P
>&#13;	Or, you could use something much simpler.  Assuming the output from
	<TT
CLASS="literal"
>dumps()</TT
> above, is saved to a file called
	<TT
CLASS="literal"
>ticket.txt</TT
>, you could run a command like:
	</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;cat ticket.txt | ssh princeton_mycontroller@mynode.someuniversity.edu
	</PRE
></TD
></TR
></TABLE
><P
>&#13;	Alternately,
	</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;p = subprocess.Popen(['/usr/bin/ssh', 'princeton_mycontroller@mynode.someuniversity.edu'], 
					stdin=subprocess.PIPE, stdout=subprocess.PIPE)
print &#62;&#62;p.stdin, xmlrpclib.dumps((ticket,), 'Ticket')
p.stdin.close()
print xmlrpclib.loads(p.stdout.read())
p.wait() 
	</PRE
></TD
></TR
></TABLE
><P
>&#13;	The following is a stub to use as you would use the current
	xmlrpclib.Server() object, but redirects the connection of SSH.
	</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;"""XML-RPC over SSH.

	To use, create an XmlRpcOverSsh object like so:
		&#62;&#62;&#62; api = XmlRpcOverSsh('princeton_deisenst@planetlab-1.cs.princeton.edu')
	and call methods as with the normal xmlrpclib.ServerProxy interface.
"""

from subprocess import PIPE, Popen
from xmlrpclib import Fault, dumps, loads

__all__ = ['XmlRpcOverSsh']


class XmlRpcOverSsh:
    def __init__(self, userAtHost):
        self.userAtHost = userAtHost

    def __getattr__(self, method):
        return _Method(self.userAtHost, method)


class _Method:
    def __init__(self, userAtHost, method):
        self.userAtHost = userAtHost
        self.method = method

    def __call__(self, *args):
        p = Popen(['ssh', self.userAtHost], stdin=PIPE, stdout=PIPE)
        stdout, stderr = p.communicate(dumps(args, self.method))
        if stderr:
            raise Fault(1, stderr)
        else:
            return loads(stdout)
	</PRE
></TD
></TR
></TABLE
></DIV
></DIV
><DIV
CLASS="chapter"
><HR><H1
><A
NAME="Methods"
></A
>Ceni API Methods</H1
><P
></P
></DIV
></DIV
>
