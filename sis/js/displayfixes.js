jQuery(document).ready(function () {
    /* Add Overarching CSS */
    jQuery("head").append("<link rel='stylesheet' type='text/css' href='/collections/sites/all/libraries/utk/overarching.css'>");

    /* Fix PIDs in Breadcrumbs */
    jQuery(".breadcrumb > a").attr('class', 'breadcrumbanchor');
    jQuery(".breadcrumbanchor").each(function (i) {
        /* alert(jQuery(this).html()); */
        if (jQuery(this).html() == "digital:collections") {
            jQuery(this).html("Digital Collections");
        }
        else if (jQuery(this).html() == "gsmrc:derris") {
            jQuery(this).html("The William Derris Slide Collection");
        }
        else if (jQuery(this).html() == "collections:gsmrc") {
            jQuery(this).html("Great Smoky Mountains Regional Collection");
        }
        else if (jQuery(this).html() == "gsmrc:adams") {
            jQuery(this).html("Paul J. Adams Photograph Collection");
        }
        else if (jQuery(this).html() == "collections:sanborn") {
            jQuery(this).html("Sanborn Fire Insurance Maps Collection");
        }
        else if (jQuery(this).html() == "gsmrc:kintner") {
            jQuery(this).html("Panoramic Images of Elgin P. Kintner, M.D.");
        }
        else if (jQuery(this).html() == "collections:mpabaker") {
            jQuery(this).html("Photographs from the Life and Career of Howard Baker");
        }
        else if (jQuery(this).html() == "gsmrc:wcc") {
            jQuery(this).html("William Cox Cochran Photographic Collection");
        }
	else if (jQuery(this).html() == "collections:ekcd") {
            jQuery(this).html("Crime Documents of Estes Kefauver");
        }
        else if (jQuery(this).html() == "collections:hbs") {
            jQuery(this).html("Senator Howard Baker Speeches and Remarks, 1966-1985");
       	}
    });

    /* Remove Collection Titles from Splash Pages*/
    var pagetitle = jQuery("#page-title").html();
    if ((pagetitle) == "William Derris Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Charlie Daniel Editorial Cartoon Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Sanborn Fire Insurance Maps Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Panoramic Images of Elgin P. Kintner, M.D.") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Paul J. Adams Photograph Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "WWII Oral Histories Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Great Smoky Mountains Colloquy") {
        jQuery("#page-title").remove();
    }

    else if ((pagetitle) == "Photographs from the Life and Career of Howard Baker") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Herbert M. Webster Photograph Collection") {
        jQuery("#page-title").remove();
    }

    else if ((pagetitle) == "William Cox Cochran Photographic Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "William Derris Collection Technical Information") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "WWII Oral Histories Project") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "WWII Oral Histories Center for War and Society") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Herbert M. Webster Photograph Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Postcards from the Great Smoky Mountains") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Fifty Years in Cades Cove Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Estes Kefauver Image Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Tennessee Alumnus") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "The Botanical Photography of Alan S. Heilman") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Smoky Mountains Hiking Club Handbooks") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "University of Tennessee Commencement Programs") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Bass Splash Page") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Children's Defense Fund") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Volunteer Voices Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Crime Documents from the Estes Kefauver Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Virginia P. Moore Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Mugwump Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Dedication of the James Agee Memorial Library") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "University Monthly Content") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Humming Humbug") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Independent Truth") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Phoenix Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "The University of Tennessee Theatre Playbills Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "The Tennessean") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Tennessee Girl Handbook Collection") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Torchbearer") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Vocational Voice") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Nineteenth and Early Twentieth Century Images of Egypt") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Anna Catherine Wiley Sketches") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Tennessee Football Programs") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Druid") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "Air Scoop: The Air Force Cadet Newsletter") {
        jQuery("#page-title").remove();
    }
    else if ((pagetitle) == "University of Tennessee Swimming and Diving Media Guides") {
        jQuery("#page-title").remove();
    }







    /* Fix Names in Dropdown List */
    jQuery(("option[value='gsmrc:derris']")).html("William Derris Slide Collection");
    jQuery(("option[value='gsmrc:adams']")).html("Paul J. Adams Photograph Collection");
    jQuery(("option[value='gsmrc:kintner']")).html("Panoramic Images of Elgin P. Kintner, M.D.");
    jQuery(("option[value='cDanielEdCartoon:cDanielCauses']")).remove();
    jQuery(("option[value='cDanielEdCartoon:cDanielInternat']")).remove();
    jQuery(("option[value='cDanielEdCartoon:cDanielKnoxvl']")).remove();
    jQuery(("option[value='cDanielEdCartoon:cDanielLabor']")).remove();
    jQuery(("option[value='cDanielEdCartoon:cDanielNatPol']")).remove();
    jQuery(("option[value='cDanielEdCartoon:cDanielSports']")).remove();
    jQuery(("option[value='cDanielEdCartoon:cDanielTVA']")).remove();
    jQuery(("option[value='cDanielEdCartoon:cDanielTaxes']")).remove();
    jQuery(("option[value='cDanielEdCartoon:cDanielTenn']")).remove();
    jQuery(("option[value='cDanielEdCartoon:cDanielUT']")).remove();
    jQuery(("option[value='gsmrc:wderfilms']")).remove();

    /* Remove \ from Breadcrumbs 
    jQuery(".breadcrumbanchor").each(function (i) {
        var breadcrumbvalue = jQuery(this).html();
        var newbreadcrumb = breadcrumbvalue.replace(/\\/gi, "");
        jQuery(this).html(newbreadcrumb);
    }); */

    /* Change Class for New Splash Menu */
    var doesithaveasplashmenu = jQuery("#region-newsplashmenuregion").length;
    if ((doesithaveasplashmenu) > 0) {
        jQuery("ul.menu").removeClass("menu").addClass("splashmenu");
        jQuery(".splashmenu").css("list-style-type", "none");
    }

    /* Fix book reader for 50 Years in Cades Cove */
    var pidURL = window.location.href;
    var myRegExpress = /islandora\/object\/50yrcove\%3A/;
    var bookReaderReg = /\#page/;
    var isFiftyYears = myRegExpress.exec(pidURL);
    var isBookReader = bookReaderReg.exec(pidURL);
    if (isFiftyYears != null && isBookReader != null) {
        jQuery('#booksearch > #textSrch').remove();
        jQuery('#booksearch > #btnSrch').remove();
        jQuery('#BRtoolbarbuttons > .info').remove();
    }


});
