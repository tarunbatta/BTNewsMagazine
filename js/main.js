$(document).ready(function() {
	$("li.current-menu-item").addClass('active');
	$("li.current_page_item").addClass('active');
	$("li.current-page-ancestor").addClass('active');

	$('.sidebar-module > ul').addClass('list-group');
	$('.sidebar-module > ul > li').addClass('list-group-item');
});