/* Theme Stuff */
jQuery(document).ready(function () {
    jQuery("head").append("<link rel='stylesheet' type='text/css' href='/collections/sites/all/libraries/utk/splashstyle.css'>");
    var collectionname = jQuery("#splashintrotext").attr('href');
    /* Collection Dropdown Selector */
    if (collectionname == '/collections/derriscollection') {
        jQuery(("option[value='gsmrc:derris']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:derris']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/scopescollection') {
        jQuery(("option[value='collections:scopes']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:scopes']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/cdanielcartooncollection') {
        jQuery(("option[value='collections:cDanielCartoon']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:cDanielCartoon']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/sanbornmapcollection') {
        jQuery(("option[value='collections:sanborn']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:sanborn']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/kintnercollection') {
        jQuery(("option[value='gsmrc:kintner']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:kintner']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/50yrcovecollection') {
        jQuery(("option[value='gsmrc:50yrcove']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:50yrcove']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/adamscollection') {
        jQuery(("option[value='gsmrc:adams']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:adams']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/postcardcollection') {
        jQuery(("option[value='gsmrc:pcard00']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:pcard00']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/bakercollection') {
        jQuery(("option[value='collections:mpabaker']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:mpabaker']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/kefauvercollection') {
        jQuery(("option[value='collections:kefauver']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:kefauver']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/wccochrancollection') {
        jQuery(("option[value='gsmrc:wcc']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:wcc']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/webstercollection') {
        jQuery(("option[value='gsmrc:webster']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:webster']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/alumnuscollection') {
        jQuery(("option[value='collections:alumnus']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:alumnus']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/heilmancollection') {
        jQuery(("option[value='collections:heilman']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:heilman']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/hikingclub') {
        jQuery(("option[value='gsmrc:smhc']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:smhc']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/edgamblecollection') {
        jQuery(("option[value='collections:gamble']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:gamble']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/commencementscollection') {
        jQuery(("option[value='collections:utkcomm']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:utkcomm']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/basscollection') {
        jQuery(("option[value='collections:bass']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:bass']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/cdfcollection') {
        jQuery(("option[value='collections:cdf']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:cdf']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/volvoices') {
        jQuery(("option[value='collections:volvoices']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:volvoices']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/bcpl') {
        jQuery(("option[value='collections:bcpl']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:bcpl']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/knoxgardenscollection') {
        jQuery(("option[value='collections:knoxgardens']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:knoxgardens']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/crimedocuments') {
        jQuery(("option[value='collections:ekcd']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:ekcd']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/vpmoore') {
        jQuery(("option[value='collections:vpmoore']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:vpmoore']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/colloquy') {
        jQuery(("option[value='gsmrc:colloquy']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:colloquy']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/mugwump') {
        jQuery(("option[value='collections:mugwump']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:mugwump']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/universitymonthly') {
        jQuery(("option[value='collections:univmonthly']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:univmonthly']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/ageelibrary') {
        jQuery(("option[value='collections:agee']")).prependTo("#edit-collection-select");
        Query(("option[value='collections:agee']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/humminghumbug') {
        jQuery(("option[value='collections:humbug']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:humbug']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/independenttruth') {
        jQuery(("option[value='collections:indtruth']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:indtruth']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/phoenixcollection') {
        jQuery(("option[value='collections:phoenix']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:phoenix']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/playbillscollection') {
        jQuery(("option[value='collections:playbills']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:playbills']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/the_tennessean') {
        jQuery(("option[value='collections:tennessean']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:tennessean']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/tenngirlcollection') {
        jQuery(("option[value='collections:tenngirl']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:tenngirl']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/torchbearercollection') {
        jQuery(("option[value='collections:torch']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:torch']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/vocationalvoice') {
        jQuery(("option[value='collections:voice']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:voice']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/egyptcollection') {
        jQuery(("option[value='collections:egypt']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:egypt']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/acwiley') {
        jQuery(("option[value='collections:acwiley']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:acwiley']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/footballprograms') {
        jQuery(("option[value='collections:fbpro']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:fbpro']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/airscoopcollection') {
        jQuery(("option[value='collections:ascoop']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:ascoop']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/druidcollection') {
        jQuery(("option[value='collections:druid']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:druid']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/swimguides') {
        jQuery(("option[value='collections:swim']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:swim']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/yrbcollection') {
        jQuery(("option[value='collections:yrb']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:yrb']")).attr('selected', 'selected');
    }
   if (collectionname == '/collections/hbscollection') {
        jQuery(("option[value='collections:hbs']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:hbs']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/ruskincollection') {
        jQuery(("option[value='collections:ruskin']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:ruskin']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/ascoopcollection') {
        jQuery(("option[value='collections:ascoop']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:ascoop']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/vvsmcollection') {
        jQuery(("option[value='collections:vanvactor']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:vanvactor']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/utsmccollection') {
        jQuery(("option[value='collections:utsmc']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:utsmc']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/archivisioncollection') {
        jQuery(("option[value='collections:archivision']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:archivision']")).attr('selected', 'selected');
    }
    if (collectionname == '/collections/thompsoncollection') {
        jQuery(("option[value='gsmrc:thompson']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:thompson']")).attr('selected', 'selected');
    }
    /* Ugh--the above won't work if we use the New Menu Options for the Splash Pages so here */
    collectionname = jQuery("#splash-logo").attr('alt');
    if (collectionname == 'Banner Image for the William Derris Slide Collection') {
        jQuery(("option[value='gsmrc:derris']")).prependTo("#edit-collection-select");
        jQuery(("option[value='gsmrc:derris']")).attr('selected', 'selected');
    }
    if (collectionname == 'WWII Oral History Collection Banner Image') {
        jQuery(("option[value='collections:wwiioh']")).prependTo("#edit-collection-select");
        jQuery(("option[value='collections:wwiioh']")).attr('selected', 'selected');
    }
    /* ID Images in Content */
    jQuery("#leftside > img").attr('id', 'splashpageimg');
    jQuery("#rightside > img").attr('id', 'splashpageimg');
});

