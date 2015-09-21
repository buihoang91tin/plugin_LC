function change_radio(e) {

    var _parent_element = e.parentElement.parentElement;
    var _radio_elements = _parent_element.getElementsByClassName('option-input radio');

    if(_radio_elements[0].checked == true){
    	_radio_elements[1].checked = true;

    	_radio_elements[0].checked = false;
    }else{
    	_radio_elements[0].checked = true;
    	_radio_elements[1].checked = false;

    }

}
