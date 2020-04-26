function del(id){
	 var empty = ""
	 var target_element_parent = document.getElementById(id).parentNode;
	 
	 target_element_parent.parentNode.firstElementChild.lastElementChild.classList.remove('d-none');

		//inputタグを表示
		target_element_parent.innerHTML = empty;

		target_element_parent.parentNode.firstElementChild.firstElementChild.value = empty;
}