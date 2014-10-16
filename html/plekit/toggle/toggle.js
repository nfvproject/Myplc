
function pletoggle_store(id){var area=$('toggle-area-'+id);key='toggle.'+id;$.jStorage.set(key,area.visible());}
function pletoggle_from_store(id){key='toggle.'+id;var stored=$.jStorage.get(key,undefined);if(stored==true||stored==false){pletoggle_set_visible(id,stored);}}
function pletoggle_toggle(id){var area=$('toggle-area-'+id);area.toggle();var visible=$('toggle-image-visible-'+id);var hidden=$('toggle-image-hidden-'+id);if(area.visible()){visible.show();hidden.hide();}else{visible.hide();hidden.show();}
pletoggle_store(id);}
function plc_toggle(id){return pletoggle_toggle(id);}
function pletoggle_set_visible(id,status){var area=$('toggle-area-'+id);if(area.visible()!=status)pletoggle_toggle(id);}
function pletoggle_toggle_info(id){var area=$('toggle-area-'+id);var info=$('toggle-info-'+id);if(area.visible()&&info.visible()){info.hide();}else{pletoggle_set_visible(id,true);info.show();}}