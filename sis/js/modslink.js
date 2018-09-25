jQuery(document).ready(function() {
	var pidURL = window.location.href;
	var myRegex = /[^/]+$/;
	var regVal = myRegex.exec(pidURL);
	//var modsURL = "http://digital.lib.utk.edu:8080/fedora/objects/" + regVal[0] + "/datastream/MODS/content?download=true";
	var modsURL = "http://digital.lib.utk.edu/collections/islandora/object/" + regVal[0] + "/datastream/MODS/content?download=true";
	jQuery("#MODSlink").append('<a href="'+modsURL+'">Download the MODS Record</a>');
});
