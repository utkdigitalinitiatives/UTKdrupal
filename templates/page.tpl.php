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
   * 			<?php if ($logo): ?>
* 					<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
* 							<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
* 					</a>
* 			<?php endif; ?>
*/
?>
<!-- Begin of Access Denied Check and redirrect to login -->
<?php
  if ($title == 'Access denied') {
    header( 'Location: /user?destination=' . substr ($_SERVER['REQUEST_URI'],1 ) );
  } ?>';
<!-- End of Access Denied Check and redirrect to login -->

<!-- start page.tpl.php template -->
<!-- The UT Header begins here. -->
<!-- Will remove orange bar later for semantic html -->
<div id="orange-bar"></div>
<div id="wrapper">
  <!-- Begin Header Region -->
  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu' : 'without-secondary-menu'; ?>">
    <div id="university-logo-wrapper">
      <a href="http://www.utk.edu"><div id="university-logo"></div></a>
    </div>
    <a class="sr-only" href="#content" title="Skip to content">Skip to content</a>
    <?php print render($page['header']); ?>
    <!-- Begin site_slogan -->
    <div id="banner-section">
      <div class="site_slogan">
        <?php
          if ($site_slogan): ?>
            <h1 id="site_slogan"><?php
          print $site_slogan; ?></h1>
        <?php endif; ?>
      </div>
    </div>
    <!-- End site_slogan -->
  </div>
  <!-- End Header Region -->
  <div id="content-wrapper">
    <div id="content">
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
      <!-- Begin Help Region -->
      <?php
        if ($page['help']): ?>
      <div id="help">
        <?php print render($page['help']); ?>
      </div>
      <?php endif; ?>
      <!-- End Help Region -->
      <!-- Begin Highlighted Region -->
      <?php
        if ($page['highlighted']): ?>
      <div id="highlighted">
        <?php print render($page['highlighted']); ?>
      </div>
      <?php endif; ?>
      <!-- End Highlighted Region -->
      <!-- Begin Content Title Region -->
      <?php print render($title_prefix); ?>
      <?php
        if ($title): ?>
      <h1 id="page-title">
        <?php print $title; ?>
      </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <!-- End Content Title Region -->
      <!-- Begin Content Tab Region -->
      <?php
        if ($tabs): ?>
      <div class="tabs">
        <!-- Begin Action Links Region -->
        <?php
          if ($action_links): ?>
        <ul class="tabs primary">
          <?php print render($action_links); ?>
        </ul>
        <?php endif; ?>
        <!-- Begin Action Links Region -->
        <?php print render($tabs); ?>
      </div>
      <?php endif; ?>
      <!-- Begin Content Tab Region -->
      <!-- Begin Content Region -->
      <div class="content-container">
        <?php
          print render($page['content']); ?>
      </div>
      <!-- End Content Region -->
      <br class="clear">
      <?php
        print $feed_icons; ?>
      <br class="clear">
      <!-- End Content Region -->
    </div>
  </div>
  <div id="leftcolumn">
    <!-- Begin Second Sidebar Region -->
    <?php
      if ($page['sidebar_second']): ?>
    <div class="left-sidebar">
      <ul class="action-links">
      </ul>
      <?php
        print render($page['sidebar_second']); ?>
    </div>
    <?php endif; ?>
    <!-- End Second Sidebar Region -->

    <!-- Begin First Sidebar Region -->
    <?php
      if ($page['sidebar_first']): ?>
    <div class="left-sidebar">
      <?php
        print render($page['sidebar_first']); ?>
    </div>
    <?php endif; ?>
    <!-- End First Sidebar Region -->
    <p style="clear:both;"></p>
  </div>
  <!-- Begin Footer Region -->
  <?php
    if ($page['footer']): ?>
  <div id="footer-drupal">
    <?php
      print render($page['footer']); ?>
  </div>
  <?php endif; ?>
  <!-- End Footer Region -->
  <div id="footer">
    <div class='footer-row'>
      <div class='footer-block'>
        <h3>University Libraries</h3>
      </div>
      <div class='footer-block'>
        <p>1015 Volunteer Boulevard<br />
          Knoxville, TN 37996-1000<br />
          Phone: (865) 974-4351
        </p>
      </div>
    </div>
    <div class='footer-row footer-bottom-row'>
      <div class='footer-block'>
        <div id="big-orange-logo-wrapper">
          <div id="big-orange-logo">
            <a href="#" id="big-orange-logo-link"></a>
          </div>
        </div>
        <p><strong>The University of Tennessee, Knoxville</strong><br />
          Knoxville, Tennessee 37996<br />
          865-974-1000
        </p>
      </div>
      <div class='footer-block'>
        <form method="post" action="http://google.tennessee.edu/search">
          <div class="campus-search-form">
            <input type="text" class="campus-search-form-input" name="q"  maxlength="256" onfocus="if(this.value == 'Search utk.edu') { this.value = ''; }" value="Search utk.edu">
          </div>
          <input type="submit" name="btnG" id="go_search"  value="Go">
          <input type="hidden" name="output" value="xml_no_dtd">
          <input type="hidden" name="oe" value="UTF-8">
          <input type="hidden" name="ie" value="UTF-8">
          <input type="hidden" name="ud" value="1">
          <input type="hidden" name="site" value="Knoxville">
          <input type="hidden" name="client" value="utk_translate_frontend">
          <input type="hidden" name="entqr" value="3">
          <input type="hidden" name="qtype" class="searchtext" value="utk" title="search type">
          <input type="hidden" name="proxystylesheet" value="utk_translate_frontend">
        </form>
        <ul class="university-links">
          <li><a href="http://www.utk.edu/events/">Events</a></li>
          <li><a href="http://www.utk.edu/maps/">Map</a></li>
        </ul>
        <ul class="university-links">
          <li><a href="http://www.utk.edu/alpha/">A-Z </a></li>
          <li><a href="http://directory.utk.edu">Directory</a></li>
        </ul>
        <ul class="university-links">
          <li><a href="http://www.utk.edu/admissions/">Apply</a></li>
          <li><a href="http://giveto.utk.edu">Give to UT</a></li>
        </ul>
      </div>
    </div>
    <div id="system-indicia">
      <p class="bottom-footer-text">The flagship campus of <a href="http://tennessee.edu">the University of Tennessee System</a> and partner in <a href="http://www.tntransferpathway.org/">the Tennessee Transfer Pathway</a>.</p>
    </div>
    <!-- End Footer Region -->
    <br class="clear">
  </div>
</div>
<script>
  UserVoice=window.UserVoice||[];(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/FD76oSQaYThdUhkScrcsQ.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})();
  UserVoice.push(['set', {
    accent_color: '#e2753a',
    trigger_color: 'white',
    trigger_background_color: '#e2753a'
  }]);

  UserVoice.push(['identify', {
  }]);
  UserVoice.push(['addTrigger', {mode: 'contact', trigger_position: 'bottom-right' }]);
  UserVoice.push(['autoprompt', {}]);
</script>
