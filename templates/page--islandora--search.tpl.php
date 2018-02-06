<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<!-- Begin of Access Denied Check and redirrect to login -->
<?php
  if ($title == 'Access denied') {
    header( 'Location: /user?destination=' . substr ($_SERVER['REQUEST_URI'],1 ) );
  } ?>
<!-- End of Access Denied Check and redirrect to login -->

<!-- start page--islandora--search.tpl.php template -->
 <!-- The UT Header begins here. -->

    <div id="orange-bar"></div>

<div id="page" class="hfeed site row-offcanvas">
	  <div id="main" class="site-main">
	  <a class="sr-only sr-only-focusable" href="#content" title="Skip to content">Skip to content</a>

 <header id="masthead-webapp" class="webapp-site-header" role="banner">
         <h3 class="killer-logo"><a href="http://www.utk.edu">The University of Tennessee, Knoxville</a></h3>
         <h2 class="sr-only"><a href="https://www.lib.utk.edu" rel="home">University Libraries</a></h2>

           <div id="sitetitle-webapp">
           <h2 class="department"><a href="/" title="Tennessee Research and Creative Exchange" rel="home">TRACE: Tennessee Research and Creative Exchange</a>
                 <small><a href="https://www.lib.utk.edu">University Libraries</a></small></h2>
         </div>
<!-- 	 Begin Header Region -->
      <?php print render($page['header']); ?>
<!-- 	 End Header Region -->

   		</header><!-- #masthead -->
<!-- The UT Header ends here. -->

         <div id="top-menu">
     <!-- Begin Top Menu Region -->
	 <?php print render($page['top_menu']); ?>
	 <!-- End Top Menu Region -->
         </div>

           <div id="search-bar">
     <!-- Begin Search Bar Region -->
	 <?php print render($page['search_bar']); ?>
	 <!-- End Search Bar Region -->
         </div>

         <?php if ($page['secondary_menu']): ?>
        <div id="secondary-menu">
          <?php print render($page['secondary_menu']); ?>
        </div>
      <?php endif; ?>

<div id="primary" class="web-app-content-area">

<div id="content" class="site-content site-content wide" role="main">

	<!-- 	 Begin Page Top Region -->
	 <?php print render($page['page_top']); ?>
	 <!-- 	 End Page Top Region -->

	   <!-- Begin Breadcrumb Region -->
      <?php
        if ($breadcrumb): ?>
          <div id="breadcrumb"><?php
        print $breadcrumb; ?></div>
      <?php endif; ?>
      <!-- End Breadcrumb Region -->
      <!-- Begin Message Region -->
      <?php
        if ($messages): ?>
          <div id="message">
          <div class="section clearfix">
          <?php print $messages; ?>
        </div>
      </div>
      <?php endif; ?>
      <!-- End Message Region -->

<!-- 	 Begin Help Region -->
	 <?php print render($page['help']); ?>
	 <!-- 	 End Help Region -->

<!--          Begin Copied from Drupal system page.tpl content area line 126 to 135 -->

<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

        <div id="left-menu">
 <!--          Begin Copied from Drupal system page.tpl content area line 138 to 148 -->
              <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_first']); ?>
        </div></div> <!-- /.section, /#sidebar-first -->
      <?php endif; ?>

      <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-second" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_second']); ?>
        </div></div> <!-- /.section, /#sidebar-second -->
      <?php endif; ?>
    <!--          End Copied from Drupal system page.tpl content area line 138 to 148 -->
  </div>

  <div id="page-content">
<?php print render($page['content']); ?>
        <?php print $feed_icons; ?>

  </div>


</div>


	<!-- 	 Begin Page Bottom Region -->
	 <?php print render($page['page_bottom']); ?>
	 <!-- 	 End Page Bottom Region -->

	 <!-- 	 Begin Footer Region -->
	 <?php print render($page['footer']); ?>
	 <!-- 	 End Footer Region -->

</div>


<!-- The UT Footer starts here. -->

<!--  begin footer include -->
<!--  begin #colophon -->
    <footer id="colophon" class="site-footer" role="contentinfo">

  <div id="siteinfo">
		<div id="meta-info">
      <p>
        <strong class="sitetile"><a href="https://www.lib.utk.edu">University Libraries</a></strong><br>
</p>
		</div>
    <div id="meta-contact">
       <p>1015 Volunteer Boulevard <br />
Knoxville, TN 37996-1000<br />
Phone: (865) 974-4351<br />
<a href="https://www.lib.utk.edu/contact">Contact Us</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.lib.utk.edu/contact/website-feedback">Website Feedback</a><br />
<a href="https://www.facebook.com/utklibraries"><img src="https://www.lib.utk.edu/template/2016/images-utlibraries/social-media/facebook-16.png" title="UT Libraries on Facebook" alt="UT Libraries on Facebook" width="16" height="16" /></a>
          &nbsp;
          <a href="https://foursquare.com/v/john-c-hodges-library/4b16792cf964a52077b923e3"><img src="https://www.lib.utk.edu/template/2016/images-utlibraries/social-media/foursquare-16.png" title="UT Libraries on Foursquare" alt="UT Libraries on Foursquare" width="16" height="16" /></a>
                &nbsp;
                <a href="https://instagram.com/utklibraries/"><img src="https://www.lib.utk.edu/template/2016/images-utlibraries/social-media/instagram-16.png" title="UT Libraries on Instagram" alt="UT Libraries on Instagram" width="16" height="16" /></a>
                        &nbsp;
                          <a href="https://pinterest.com/utklibraries"><img src="https://www.lib.utk.edu/template/2016/images-utlibraries/social-media/pinterest-16.png" title="UT Libraries on Pinterest" alt="UT Libraries on Pinterest" width="16" height="16" /></a>
        &nbsp;
        <a href="https://twitter.com/utklibraries"><img src="https://www.lib.utk.edu/template/2016/images-utlibraries/social-media/twitter-16.png" title="UT Libraries on Twitter" alt="UT Libraries on Twitter" width="16" height="16" /></a>
        &nbsp;
        <a href="https://www.youtube.com/user/utklibraries"><img src="https://www.lib.utk.edu/template/2016/images-utlibraries/social-media/youtube-16.png" title="UT Libraries on YouTube" alt="UT Libraries on YouTube" width="16" height="16" /></a>
		        &nbsp;
		        <a href="https://itunes.apple.com/us/app/tennessee/id548076679?mt=8"><img src="https://www.lib.utk.edu/template/2016/images-utlibraries/social-media/ut-16.png" title="University of Tennessee iOS App" alt="University of Tennessee iOS App" width="16" height="16" /></a></p>
    </div>

   </div><!-- #siteinfo -->




        <!-- Here Begins The Campus Footer. Do not touch below this line -->

 <div id="campus-footer">
   <div id="utk">
     <div id="bobi">
        <h2><a href="http://www.utk.edu" class="logo icon-bobi-main">The University of Tennessee</a></h2>
      </div>
      <div id="address">
          <p><strong>The University of Tennessee, Knoxville</strong><br>Knoxville, Tennessee 37996<br> 865-974-1000</p>
      </div>
    </div>

    <div id="toolkit">
      <form method="post" action="http://google.tennessee.edu/search">
          <div class="form-group">
             <input type="text" class="form-control" name="q"  maxlength="256" onfocus="if(this.value == 'Search utk.edu') { this.value = ''; }" value="Search utk.edu" title="Search UT Knoxville">
          </div>
          <input type="submit" name="btnG" class="btn btn-orange"  value="Go">

          <input type="hidden" name="output" value="xml_no_dtd">
          <input type="hidden" name="oe" value="UTF-8">
          <input type="hidden" name="ie" value="UTF-8">
          <input type="hidden" name="ud" value="1">
          <input type="hidden" name="site" value="Knoxville">
          <input type="hidden" name="client" value="utk_translate_frontend">
          <input type="hidden" name="entqr" value="3">
          <!--    <input type="hidden" name="sitesearch" value="utk.edu" /> -->
          <input type="hidden" name="qtype" class="searchtext" value="utk" title="search type">
          <input type="hidden" name="proxystylesheet" value="utk_translate_frontend">
      </form>
      <br>
      <nav  role="navigation">
          <ul>
            <li><a href="http://www.utk.edu/events/">Events</a></li>
            <li><a href="http://www.utk.edu/maps/">Map</a></li>
          </ul>
          <ul>
            <li><a href="http://www.utk.edu/alpha/">A-Z </a></li>
            <li><a href="http://directory.utk.edu">Directory</a></li>
          </ul>
          <ul>
            <li><a href="http://www.utk.edu/admissions/">Apply</a></li>

            <li>
            <a href="http://giveto.utk.edu">Give to UT</a>
            </li>
                      </ul>
      </nav>
    </div>
</div>
</footer><!--  end #colophon -->
<!--  end footer include -->

  <div id="system-indicia">
    <p>The flagship campus of <a href="http://tennessee.edu">the University of Tennessee System</a> and partner in <a href="http://www.tntransferpathway.org/">the Tennessee Transfer Pathway</a>.</p>
  </div>

<!-- The UT Footer ends here. -->

</div> <!-- /#page>
<!-- end page--islandora--search.tpl.php template -->

<script>

// #block-system-main
//
// document.getElementById('main').getElementsByClassName('test');

var list = document.getElementsByClassName("solr-thumb");
 for(var i = list.length - 1; 0 <= i; i--)
 if(list[i] && list[i].parentElement)
 list[i].parentElement.removeChild(list[i]);


</script>
