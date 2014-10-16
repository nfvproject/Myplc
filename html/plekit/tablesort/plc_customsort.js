
function _sortAlphaNumericPrepareData(tdNode,innerText){var aa=innerText.toLowerCase().replace(" ","");var reg=/((\-|\+)?(\s+)?[0-9]+\.([0-9]+)?|(\-|\+)?(\s+)?(\.)?[0-9]+)([a-z]+)/;if(reg.test(aa)){var aaP=aa.match(reg);return[aaP[1],aaP[8]];};return isNaN(aa)?["",aa]:[aa,""];}
function _sortAlphaNumeric(a,b,non_numeric_first){var aa=a[fdTableSort.pos];var bb=b[fdTableSort.pos];if(aa[0]!=bb[0]){if(aa[0]!=""&&bb[0]!=""){return aa[0]-bb[0];};if(aa[0]==""&&bb[0]!="")
return non_numeric_first?-1:1;else
return non_numeric_first?1:-1;}else if(aa[1]==bb[1]){return 0;}else{return(aa[1]<bb[1]?-1:1);}}
function sortAlphaNumericBottomPrepareData(tdNode,innerText){return _sortAlphaNumericPrepareData(tdNode,innerText);}
function sortAlphaNumericBottom(a,b){return _sortAlphaNumeric(a,b,false);}
function sortAlphaNumericTopPrepareData(tdNode,innerText){return _sortAlphaNumericPrepareData(tdNode,innerText);}
function sortAlphaNumericTop(a,b){return _sortAlphaNumeric(a,b,true);}