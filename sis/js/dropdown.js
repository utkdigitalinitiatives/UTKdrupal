jQuery(document).ready(function() {

	jQuery('.navigationtop > li').bind('mouseover', openSubMenu);
	jQuery('.navigationtop > li').bind('mouseleave', closeSubMenu);
	
	function openSubMenu() {
	  jQuery(this).addClass('active');
	  jQuery(this).find('> ul').stop(true, true).slideDown(200);
	}
	
	function closeSubMenu() {
	  jQuery(this).removeClass('active');
	  jQuery(this).find('> ul').stop(true, true).slideUp(200);
	}

	jQuery("div#region-menu").attr("style","display: block");
});