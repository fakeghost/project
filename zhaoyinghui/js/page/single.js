window.onload = function () {
	doc_height();
}

//js控制文档高度
function doc_height(){
	var nav_height = document.getElementsByTagName('header')[0].offsetHeight;
	var s_height = window.screen.availHeight;
	document.getElementsByClassName('single_container')[0].style.minHeight = s_height - nav_height + 'px';
}