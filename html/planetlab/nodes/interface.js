
function arr_to_int(as){a=as.map(function(x){return parseInt(x)&0xff;});return(a[0]<<24)|(a[1]<<16)|(a[2]<<8)|a[3];}
function int_to_arr(n){var a=[];a[0]=(n&0xff000000)>>>24;a[1]=(n&0x00ff0000)>>>16;a[2]=(n&0x0000ff00)>>>8;a[3]=(n&0x000000ff)>>>0;return a;}
function int_to_bits(n){var a=[];for(var i=0;i<32;i++){a[31-i]=n&1;n=n>>>1;}
return a;}
function mask(masklen){return(0xffffffff<<(32-masklen));}
function get_masklen(netmask){var a=netmask.split('.');if(IPCheckerAtom(netmask,'netmask'))return-1;var n=arr_to_int(a);var bits=int_to_bits(n);var masklen=0;while(bits[masklen]&&masklen<32)masklen++;var n_mask=mask(masklen);return(n==n_mask)?masklen:-1;}
function get_derived(n,masklen){var n_mask=mask(masklen);var r=[];r[0]=int_to_arr(n&n_mask).join(".");r[1]=int_to_arr(n|~n_mask).join(".");return r;}
function same_subnet(ip1,ip2,masklen){var n1=arr_to_int(ip1.split("."));var n2=arr_to_int(ip2.split("."));return(n1&mask(masklen))==(n2&mask(masklen));}
function IPCheckerAtom(ip,id){if(!ip)return"Empty field "+id;ip_a=ip.split('.');if(ip_a.length!=4)return"Invalid IP ("+id+") "+ip;for(var i=0;i<4;i++)if(ip_a[i]<0||ip_a[i]>256)return"Invalid IP ("+id+") "+ip;return"";}
function IPCheckerSilent(id){return IPCheckerAtom($(id).value,id);}
function netmaskCheckerSilent(id){var netmask=$(id).value;var check_ip=IPCheckerAtom(netmask,'netmask');if(check_ip)return check_ip;var masklen=get_masklen(netmask);if(masklen<=0)return"Invalid netmask "+netmask;return"";}
function subnetChecker(id,optional){var error=subnetCheckerSilent($(id).value);if(error){Form.Element.focus($(id));alert(error);}}
function subnetCheckerSilent(id,optional){var subnet=$(id).value;if(optional&&(subnet==""))return"";var check_ip=IPCheckerAtom(subnet,id);if(check_ip)return check_ip;var masklen=get_masklen($('netmask').value);if(masklen<0)return"Could not check "+id;var ip=$('ip').value;if(!same_subnet(ip,subnet,masklen))
return id+' '+subnet+' is not in the /'+masklen+' subnet range';return"";}
function macChecker(id,optional){var error=macCheckerSilent($(id).value);if(error){Form.Element.focus($(id));alert(error);}}
function macCheckerSilent(macAdd){var RegExPattern=/^[0-9a-fA-F:]+$/;if(!(macAdd.match(RegExPattern))||macAdd.length!=17){return"Invalid MAC Address";}else{return"";}}
function networkHelper(){var ip=$('ip').value;var netmask=$('netmask').value;if(IPCheckerAtom(ip,'ip'))return;if(IPCheckerAtom(netmask,'netmask'))return;var masklen=get_masklen(netmask);if(masklen<=0)return;var ip_a=ip.split('.');var ip_n=arr_to_int(ip_a);var derived=get_derived(ip_n,masklen);$('network').value=derived[0];$('broadcast').value=derived[1];}
function updateMethodFields(){var method=$('method');var index=method.selectedIndex;var selectedText=method[index].text;var is_static=selectedText=='Static';var is_tap=selectedText=='TUN/TAP';$('netmask').disabled=!is_static;$('network').disabled=!is_static;$('gateway').disabled=!is_static&&!is_tap;$('broadcast').disabled=!is_static;$('dns1').disabled=!is_static;$('dns2').disabled=!is_static;}
function interfaceSubmit(){var method=$('method');var index=method.selectedIndex;var selectedText=method[index].text;var is_static=selectedText=='Static';var is_tap=selectedText=='TUN/TAP';var errors="";var counter=0;var error;error=IPCheckerSilent('ip');if(error)errors+=error+"\n";if(!$('netmask').disabled){error=netmaskCheckerSilent('netmask');if(error)errors+=error+"\n";}
if(!$('network').disabled){error=IPCheckerSilent('network');if(error)errors+=error+"\n";}
if(!$('gateway').disabled){error=subnetCheckerSilent('gateway',false);if(error)errors+=error+"\n";}
if(!$('broadcast').disabled){error=subnetCheckerSilent('broadcast',false);if(error)errors+=error+"\n";}
if(!errors.length){return true;}else{alert("-- Cannot create interface --\n"+errors);return false;}}
function updateVirtualArea(){var is_virtual=$('virtual').checked;$('ifname').disabled=!is_virtual;$('alias').disabled=!is_virtual;}
Event.observe(window,'load',updateMethodFields);Event.observe(window,'load',updateVirtualArea);