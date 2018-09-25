// ======== TURN THE NAVIGATION INTO A DROPDOWN LIST =============

	 // DOM ready
	 $(function() {
	   
      // Create the dropdown base
      $("<select />").appendTo("#block-menu-menu-horizontal-menu");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Go to..."
      }).appendTo("#block-menu-menu-horizontal-menu select");
      
      // Populate dropdown with menu items
      $("#block-menu-menu-horizontal-menu a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("#block-menu-menu-horizontal-menu select");
      });
      
	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
      $("#block-menu-menu-horizontal-menu select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
	 
	 });



// ======== FIT VIDEO CONTAINER =============



$(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $("#videowrap").fitVids();
    $("div").fitVids();
});


$(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $("#videowrap2").fitVids();
    $("div").fitVids();
});



$(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $("#videowrap3").fitVids();
    $("div").fitVids();
});



$(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $("#videowrap4").fitVids();
    $("div").fitVids();
});



$(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $("#videowrap5").fitVids();
    $("div").fitVids();
});




// ========  ROTATOR ==========================


  $(window).load(function() {
    $('.rotator').flexslider({
							animation: "fade",              //String: Select your animation type, "fade" or "slide"
							slideshow: true,                //Boolean: Animate slider automatically
							directionNav: false,             //Boolean: Create navigation for previous/next navigation? (true/false)
							controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
							randomize: true,                //Boolean: Randomize slide order
							controlsContainer: ".rotator"
    });
  });


// ========  HIDDEN NAVIGATION ==========================


$(window).load(function() {

	$('.subslider li').hide();
	$('#close').hide();

	$('.subnav').one('mouseover', function() {
		$('.subslider li').show('slow');
		$('#open').hide('slow');
		$('#close').show('slow');
	});

	$('#close a').click(function(event) {

		$('.subslider li').hide('slow');
		$('#close').hide('slow');
		$('#open').show('slow');
		event.preventDefault();
	});

	$('#open a').click(function(event) {
  	
  		$('.subslider li').show('slow');
  		$('#open').hide('slow');
  		$('#close').show('slow');
  		event.preventDefault();

	});
	$('a.mapsubmit').click(function(event) {

		$('.mapresult').show('slow');
		event.preventDefault();

	});

});
 




// ======== TURN THE HIDDEN LIST INTO A DROPDOWN =============

	 // DOM ready
	 $(function() {
	   
      // Create the dropdown base
      $("<select />").appendTo("section.hidden-navigation");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Go to..."
      }).appendTo("section.hidden-navigation select");
      
      // Populate dropdown with menu items
      $("section.hidden-navigation a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("section.hidden-navigation select");
      });
      
	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
      $("section.hidden-navigation select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
	 
	 });



// ======== TURN THE TOOLBOX LIST INTO A DROPDOWN =============

	 // DOM ready
	 $(function() {
	   
      // Create the dropdown base
      $("<select />").appendTo("section.tools");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "University Tools..."
      }).appendTo("section.tools select");
      
      // Populate dropdown with menu items
      $("ul#toolbox a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("section.tools select");
      });
      
	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
      $("section.tools select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
	 
	 });