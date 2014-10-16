<?php
//
// TopHat API PHP interface
//

// TODO add tophat_api in the php default path in /etc/plc.d/httpd
// TODO occurences to PLC

define('TOPHAT_API_HOST', 'api.top-hat.info');
define('TOPHAT_API_PATH', '/API/');
define('TOPHAT_API_PORT', 443);

class TopHatAPI
{
  var $auth;
  var $server;
  var $port;
  var $path;
  var $errors;
  var $trace;
  var $calls;
  var $multicall;

  function TopHatAPI($auth = NULL,
		  $server = TOPHAT_API_HOST,
		  $port = TOPHAT_API_PORT,
		  $path = TOPHAT_API_PATH,
		  $cainfo = NULL)
  {
    $this->auth = $auth;
    $this->server = $server;
    $this->port = $port;
    $this->path = $path;
    $this->cainfo = $cainfo;
    $this->errors = array();
    $this->trace = array();
    $this->calls = array();
    $this->multicall = false;
  }

  function error_log($error_msg, $backtrace_level = 1)
  {
    $backtrace = debug_backtrace();
    $file = $backtrace[$backtrace_level]['file'];
    $line = $backtrace[$backtrace_level]['line'];

    $this->errors[] = 'TopHatAPI error:  ' . $error_msg . ' in ' . $file . ' on line ' . $line;
    error_log(end($this->errors));
  }

  function error()
  {
    if (empty($this->trace)) {
      return NULL;
    } else {
      $last_trace = end($this->trace);
      return implode("\\n", $last_trace['errors']);
    }
  }

  function trace()
  {
    return $this->trace;
  }

  function microtime_float()
  {
    list($usec, $sec) = explode(" ", microtime());
    return ((float) $usec + (float) $sec);
  }

  function call($method, $args = NULL)
  {
    if ($this->multicall) {
      $this->calls[] = array ('methodName' => $method,
				'params' => $args);
      return NULL;
    } else {
      return $this->internal_call ($method, $args, 3);
    }
  }

  function internal_call($method, $args = NULL, $backtrace_level = 2)
  {
      $curl = curl_init();

      // Verify peer certificate if talking over SSL
      if ($this->port == 443) {
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // XXX 2
          if (!empty($this->cainfo)) {
              curl_setopt($curl, CURLOPT_CAINFO, $this->cainfo);
          } elseif (defined('PLC_API_CA_SSL_CRT')) {
              curl_setopt($curl, CURLOPT_CAINFO, PLC_API_CA_SSL_CRT);
          }
          $url = 'https://';
      } else {
          $url = 'http://';
      }

      // Set the URL for the request
      $url .= $this->server . ':' . $this->port . '/' . $this->path;
      curl_setopt($curl, CURLOPT_URL, $url);

      // Marshal the XML-RPC request as a POST variable. <nil/> is an
      // extension to the XML-RPC spec that is supported in our custom
      // version of xmlrpc.so via the 'allow_null' output_encoding key.
      $request = xmlrpc_encode_request($method, $args, array('allow_null' => TRUE));
      curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

      // Construct the HTTP header
      $header[] = 'Content-type: text/xml';
      $header[] = 'Content-length: ' . strlen($request);
      curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

      // Set some miscellaneous options
      curl_setopt($curl, CURLOPT_TIMEOUT, 180);

      // Get the output of the request
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $t0 = $this->microtime_float();
      $output = curl_exec($curl);
      $t1 = $this->microtime_float();

      if (curl_errno($curl)) {
          $this->error_log('curl: ' . curl_error($curl), true);
          $ret = NULL;
      } else {
          $ret = xmlrpc_decode($output);
          if (is_array($ret) && xmlrpc_is_fault($ret)) {
              $this->error_log('Fault Code ' . $ret['faultCode'] . ': ' .
                      $ret['faultString'], $backtrace_level, true);
              $ret = NULL;
          }
      }

      curl_close($curl);

      $this->trace[] = array('method' => $method,
              'args' => $args,
              'runtime' => $t1 - $t0,
              'return' => $ret,
              'errors' => $this->errors);
      $this->errors = array();

      return $ret;
  }

  function begin()
  {
    if (!empty($this->calls)) {
      $this->error_log ('Warning: multicall already in progress');
    }

    $this->multicall = true;
  }

  function commit()
  {
    if (!empty ($this->calls)) {
      $ret = array();
      $results = $this->internal_call ('system.multicall', array ($this->calls));
      foreach ($results as $result) {
        if (is_array($result)) {
          if (xmlrpc_is_fault($result)) {
            $this->error_log('Fault Code ' . $result['faultCode'] . ': ' .
                             $result['faultString'], 1, true);
            $ret[] = NULL;
	    // Thierry - march 30 2007 
	    // using $adm->error() is broken with begin/commit style 
	    // this is because error() uses last item in trace and checks for ['errors']
	    // when using begin/commit we do run internal_call BUT internal_call checks for 
	    // multicall's result globally, not individual results, so ['errors'] comes empty
	    // I considered hacking internal_call 
	    // to *NOT* maintain this->trace at all when invoked with multicall
	    // but it is too complex to get all values right
	    // so let's go for the hacky way, and just record individual errors at the right place
            $this->trace[count($this->trace)-1]['errors'][] = end($this->errors);
          } else {
            $ret[] = $result[0];
          }
        } else {
          $ret[] = $result;
        }
      }
    } else {
      $ret = NULL;
    }

    $this->calls = array();
    $this->multicall = false;

    return $ret;
  }

  //
  // TopHatAPI Methods
  //

  // Gets measurement information.
  //
  // Returns the measurement (cf doc).

  function Test($param = NULL)
  {
    $args[] = $this->auth;
    if (func_num_args() > 0) $args[] = $param;
    return $this->call('Test', $args);
  }

  function Get($method, $timestamp, $input_filter = NULL, $output_fields = NULL, $callback = NULL)
  {
    $args[] = $this->auth;
    $args[] = $method;
    $args[] = $timestamp;
    if (func_num_args() > 2) $args[] = $input_filter;
    if (func_num_args() > 3) $args[] = $output_fields;
    if (func_num_args() > 4) $args[] = $callback;
    return $this->call('Get', $args);
  }

  // TDMI Methods

  function GetPlatforms($input_filter = NULL, $output_fields = NULL)
  {
    $args[] = $this->auth;
    if (func_num_args() > 0) $args[] = $input_filter;
    if (func_num_args() > 1) $args[] = $output_fields;
    return $this->call('GetPlatforms', $args);
  }

  function GetTraceroutes($input_filter = NULL, $output_fields = NULL)
  {
    $args[] = $this->auth;
    if (func_num_args() > 0) $args[] = $input_filter;
    if (func_num_args() > 1) $args[] = $output_fields;
    return $this->call('GetTraceroutes', $args);
  }

  // Imported PLC Methods

  // Returns a new session key if a user or node authenticated
  // successfully, faults otherwise.
  
  function GetSession ()
  {
    $args[] = $this->auth;
    return $this->call('GetSession', $args);
  }
  
  // Returns an array of structs containing details about users sessions. If
  // session_filter is specified and is an array of user identifiers or
  // session_keys, or a struct of session attributes, only sessions matching the
  // filter will be returned. If return_fields is specified, only the
  // specified details will be returned.
  
  function GetSessions ($session_filter = NULL)
  {
    $args[] = $this->auth;
    if (func_num_args() > 0) $args[] = $session_filter;
    return $this->call('GetSessions', $args);
  }
  
  // Returns an array of structs containing details about users. If
  // person_filter is specified and is an array of user identifiers or
  // usernames, or a struct of user attributes, only users matching the
  // filter will be returned. If return_fields is specified, only the
  // specified details will be returned.
  // 
  // Users and techs may only retrieve details about themselves. PIs
  // may retrieve details about themselves and others at their
  // sites. Admins and nodes may retrieve details about all accounts.
  
  function GetPersons ($person_filter = NULL, $return_fields = NULL)
  {
    $args[] = $this->auth;
    if (func_num_args() > 0) $args[] = $person_filter;
    if (func_num_args() > 1) $args[] = $return_fields;
    return $this->call('GetPersons', $args);
  }
  
  // Returns 1 if the user or node authenticated successfully, faults
  // otherwise.
  
  function AuthCheck ()
  {
    $args[] = $this->auth;
    return $this->call('AuthCheck', $args);
  }

}

?>
