
var sortEnglishDateTime=fdTableSort.sortNumeric;function sortEnglishDateTimePrepareData(tdNode,innerText){var months=['january','february','march','april','may','june','july','august','september','october','november','december','jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];var aa=innerText.toLowerCase();for(var i=0;i<months.length;i++){aa=aa.replace(months[i],(i+13)%12);};aa=aa.replace(/\s+/g," ").replace(/([^\d\s\/-:.])/g,"").replace(/^\s\s*/,'').replace(/\s\s*$/,'');if(aa.search(/(\d){2}:(\d){2}(:(\d){2})?$/)==-1){return-1;};var timestamp=aa.match(/(\d){2}:(\d){2}(:(\d){2})?$/)[0].replace(/:/g,"");if(timestamp.length==4){timestamp+="00";};aa=aa.replace(/(\d){2}:(\d){2}(:(\d){2})?$/,"").replace(/\s\s*$/,'');var favourDMY=true;var dateTest=[{regExp:/^(0?[1-9]|1[012])([- \/.])(0?[1-9]|[12][0-9]|3[01])([- \/.])((\d\d)?\d\d)$/,d:3,m:1,y:5},{regExp:/^(0?[1-9]|[12][0-9]|3[01])([- \/.])(0?[1-9]|1[012])([- \/.])((\d\d)?\d\d)$/,d:1,m:3,y:5},{regExp:/^(\d\d\d\d)([- \/.])(0?[1-9]|1[012])([- \/.])(0?[1-9]|[12][0-9]|3[01])$/,d:5,m:3,y:1}];var start,y,m,d;var cnt=0;var numFormats=dateTest.length;while(cnt<numFormats){start=(cnt+(favourDMY?numFormats+1:numFormats))%numFormats;if(aa.match(dateTest[start].regExp)){res=aa.match(dateTest[start].regExp);y=res[dateTest[start].y];m=res[dateTest[start].m];d=res[dateTest[start].d];if(m.length==1)m="0"+String(m);if(d.length==1)d="0"+String(d);if(y.length!=4)y=(parseInt(y)<50)?"20"+String(y):"19"+String(y);return y+String(m)+d+String(timestamp);};cnt++;};return-1;};function sortAlphaNumericPrepareData(tdNode,innerText){var aa=innerText.toLowerCase().replace(" ","");var reg=/((\-|\+)?(\s+)?[0-9]+\.([0-9]+)?|(\-|\+)?(\s+)?(\.)?[0-9]+)([a-z]+)/;if(reg.test(aa)){var aaP=aa.match(reg);return[aaP[1],aaP[8]];};return isNaN(aa)?["",aa]:[aa,""];}
function sortAlphaNumeric(a,b){var aa=a[fdTableSort.pos];var bb=b[fdTableSort.pos];if(aa[0]==bb[0]&&aa[1]==bb[1]){return 0;};if(aa[0]!=bb[0]){if(aa[0]!=""&&bb[0]!=""){return aa[0]-bb[0];};if(aa[0]==""&&bb[0]!=""){return-1;};return 1;};if(aa[1]==bb[1])return 0;if(aa[1]<bb[1])return-1;return 1;}
var sortDutchCurrencyValues=fdTableSort.sortNumeric;function sortDutchCurrencyValuesPrepareData(tdNode,innerText){innerText=parseInt(innerText.replace(/[^0-9\.,]+/g,"").replace(/\./g,"").replace(",","."));return isNaN(innerText)?"":innerText;}
var sortByTwelveHourTimestamp=fdTableSort.sortNumeric;function sortByTwelveHourTimestampPrepareData(tdNode,innerText){tmp=innerText
innerText=innerText.replace(":",".");if(innerText.search(/12([\s]*)?noon/i)!=-1)return"12.00";if(innerText.search(/12([\s]*)?midnight/i)!=-1)return"24.00";var regExpPM=/^([0-9]{1,2}).([0-9]{2})([\s]*)?(p[\.]?m)/i;var regExpAM=/^([0-9]{1,2}).([0-9]{2})([\s]*)?(a[\.]?m)/i;if(innerText.search(regExpPM)!=-1){var bits=innerText.match(regExpPM);if(parseInt(bits[1])<12){bits[1]=parseInt(bits[1])+12;}}else if(innerText.search(regExpAM)!=-1){var bits=innerText.match(regExpAM);if(bits[1]=="12"){bits[1]="00";}}else return"";if(bits[2].length<2){bits[2]="0"+String(bits[2]);}
innerText=bits[1]+"."+String(bits[2]);return isNaN(innerText)?"":innerText;}
var sortEnglishLonghandDateFormat=fdTableSort.sortNumeric;function sortEnglishLonghandDateFormatPrepareData(tdNode,innerText){var months=['january','february','march','april','may','june','july','august','september','october','november','december'];var aa=innerText.toLowerCase();for(var i=0;i<12;i++){aa=aa.replace(months[i],i+1).replace(months[i].substring(0,3),i+1);}
if(aa.search(/a-z/)!=-1)return-1;aa=aa.replace(/\s+/g," ").replace(/[^\d\s]/g,"");if(aa.replace(" ","")=="")return-1;aa=aa.split(" ");if(aa.length<2)return-1;if(aa.length==2){aa[2]=String(new Date().getFullYear());}
if(aa[0].length<2)aa[0]="0"+String(aa[0]);if(aa[1].length<2)aa[1]="0"+String(aa[1]);if(aa[2].length!=4){aa[2]=(parseInt(aa[2])<50)?'20'+aa[2]:'19'+aa[2];}
return aa[2]+String(aa[1])+aa[0];}
var sortIPAddress=fdTableSort.sortNumeric;function sortIPAddressPrepareData(tdNode,innerText){var aa=innerText;aa=aa.replace(" ","");if(aa.search(/^([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3})$/)==-1)return-1;aa=aa.split(".");if(aa.length!=4)return-1;var retVal="";for(var i=0;i<4;i++){retVal+=(String(aa[i]).length<3)?"0000".substr(0,3-String(aa[i]).length)+String(aa[i]):aa[i];}
return retVal;}
var sortScientificNotation=fdTableSort.sortNumeric;function sortScientificNotationPrepareData(tdNode,innerText){var aa=innerText;var floatRegExp=/((\-|\+)?(\s+)?[0-9]+\.([0-9]+)?|(\-|\+)?(\s+)?(\.)?[0-9]+)/g;aa=aa.match(floatRegExp);if(!aa||aa.length!=2)return"";var f1=parseFloat(aa[0].replace(" ",""))*Math.pow(10,parseFloat(aa[1].replace(" ","")));return isNaN(f1)?"":f1;}
var sortImage=fdTableSort.sortText;function sortImagePrepareData(td,innerText){var img=td.getElementsByTagName('img');return img.length?img[0].src:"";}
var sortFileSize=fdTableSort.sortNumeric;function sortFileSizePrepareData(td,innerText){var regExp=/(kb|mb|gb)/i;var type=innerText.search(regExp)!=-1?innerText.match(regExp)[0]:"";switch(type.toLowerCase()){case"kb":mult=1024;break;case"mb":mult=1048576;break;case"gb":mult=1073741824;break;default:mult=1;};innerText=parseFloat(innerText.replace(/[^0-9\.\-]/g,''));return isNaN(innerText)?"":innerText*mult;};var sortBandwidth=fdTableSort.sortNumeric;function sortBandwidthPrepareData(td,innerText){var regExp=/(kbps|mbps|gbps)/i;var type=innerText.search(regExp)!=-1?innerText.match(regExp)[0]:"";switch(type.toLowerCase()){case"kbps":mult=1000;break;case"mb":mult=1000000;break;case"gb":mult=1000000000;break;default:mult=1;};innerText=parseFloat(innerText.replace(/[^0-9\.\-]/g,''));return isNaN(innerText)?"":innerText*mult;};var sortLastContact=fdTableSort.sortNumeric;function sortLastContactPrepareData(td,innerText){var regExp=/(min|hrs|days|wks|mnths)/i;var type=innerText.search(regExp)!=-1?innerText.match(regExp)[0]:"";switch(type.toLowerCase()){case"hrs":mult=60;break;case"days":mult=60*24;break;case"wks":mult=60*24*7;break;case"mnths":mult=60*24*30;break;default:mult=1;};innerText=parseFloat(innerText.replace(/[^0-9\.\-]/g,''));return isNaN(innerText)?"":innerText*mult;};