
(function($){if(!$||!($.toJSON||Object.toJSON||window.JSON)){throw new Error("jQuery, MooTools or Prototype needs to be loaded before jStorage!");}
var
_storage={},_storage_service={jStorage:"{}"},_storage_elm=null,_storage_size=0,json_encode=$.toJSON||Object.toJSON||(window.JSON&&(JSON.encode||JSON.stringify)),json_decode=$.evalJSON||(window.JSON&&(JSON.decode||JSON.parse))||function(str){return String(str).evalJSON();},_backend=false;_XMLService={isXML:function(elm){var documentElement=(elm?elm.ownerDocument||elm:0).documentElement;return documentElement?documentElement.nodeName!=="HTML":false;},encode:function(xmlNode){if(!this.isXML(xmlNode)){return false;}
try{return new XMLSerializer().serializeToString(xmlNode);}catch(E1){try{return xmlNode.xml;}catch(E2){}}
return false;},decode:function(xmlString){var dom_parser=("DOMParser"in window&&(new DOMParser()).parseFromString)||(window.ActiveXObject&&function(_xmlString){var xml_doc=new ActiveXObject('Microsoft.XMLDOM');xml_doc.async='false';xml_doc.loadXML(_xmlString);return xml_doc;}),resultXML;if(!dom_parser){return false;}
resultXML=dom_parser.call("DOMParser"in window&&(new DOMParser())||window,xmlString,'text/xml');return this.isXML(resultXML)?resultXML:false;}};function _init(){if("localStorage"in window){try{if(window.localStorage){_storage_service=window.localStorage;_backend="localStorage";}}catch(E3){}}
else if("globalStorage"in window){try{if(window.globalStorage){_storage_service=window.globalStorage[window.location.hostname];_backend="globalStorage";}}catch(E4){}}
else{_storage_elm=document.createElement('link');if(_storage_elm.addBehavior){_storage_elm.style.behavior='url(#default#userData)';document.getElementsByTagName('head')[0].appendChild(_storage_elm);_storage_elm.load("jStorage");var data="{}";try{data=_storage_elm.getAttribute("jStorage");}catch(E5){}
_storage_service.jStorage=data;_backend="userDataBehavior";}else{_storage_elm=null;return;}}
_load_storage();}
function _load_storage(){if(_storage_service.jStorage){try{_storage=json_decode(String(_storage_service.jStorage));}catch(E6){_storage_service.jStorage="{}";}}else{_storage_service.jStorage="{}";}
_storage_size=_storage_service.jStorage?String(_storage_service.jStorage).length:0;}
function _save(){try{_storage_service.jStorage=json_encode(_storage);if(_storage_elm){_storage_elm.setAttribute("jStorage",_storage_service.jStorage);_storage_elm.save("jStorage");}
_storage_size=_storage_service.jStorage?String(_storage_service.jStorage).length:0;}catch(E7){}}
function _checkKey(key){if(!key||(typeof key!="string"&&typeof key!="number")){throw new TypeError('Key name must be string or numeric');}
return true;}
$.jStorage={version:"0.1.5.0",set:function(key,value){_checkKey(key);if(_XMLService.isXML(value)){value={_is_xml:true,xml:_XMLService.encode(value)};}
_storage[key]=value;_save();return value;},get:function(key,def){_checkKey(key);if(key in _storage){if(typeof _storage[key]=="object"&&_storage[key]._is_xml&&_storage[key]._is_xml){return _XMLService.decode(_storage[key].xml);}else{return _storage[key];}}
return typeof(def)=='undefined'?null:def;},deleteKey:function(key){_checkKey(key);if(key in _storage){delete _storage[key];_save();return true;}
return false;},flush:function(){_storage={};_save();try{window.localStorage.clear();}catch(E8){}
return true;},storageObj:function(){function F(){}
F.prototype=_storage;return new F();},index:function(){var index=[],i;for(i in _storage){if(_storage.hasOwnProperty(i)){index.push(i);}}
return index;},storageSize:function(){return _storage_size;},currentBackend:function(){return _backend;},storageAvailable:function(){return!!_backend;},reInit:function(){var new_storage_elm,data;if(_storage_elm&&_storage_elm.addBehavior){new_storage_elm=document.createElement('link');_storage_elm.parentNode.replaceChild(new_storage_elm,_storage_elm);_storage_elm=new_storage_elm;_storage_elm.style.behavior='url(#default#userData)';document.getElementsByTagName('head')[0].appendChild(_storage_elm);_storage_elm.load("jStorage");data="{}";try{data=_storage_elm.getAttribute("jStorage");}catch(E5){}
_storage_service.jStorage=data;_backend="userDataBehavior";}
_load_storage();}};_init();})(window.jQuery||window.$);