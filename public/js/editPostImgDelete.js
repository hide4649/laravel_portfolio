function oldDelete(id){
	 var empty = "";
	
	 var target_element_parent = document.getElementById(id).parentNode;
	 
	 target_element_parent.parentNode.firstElementChild.classList.remove('d-none');

		target_element_parent.innerHTML = empty;
}