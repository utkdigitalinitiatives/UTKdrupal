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

<!-- start page.tpl.php template -->

<!-- Begin of Access Denied Check and redirrect to login -->
<?php
if ($title == 'Access denied') {
    header('Location: /user?destination=' . substr($_SERVER['REQUEST_URI'], 1));
}
?>
<!-- End of Access Denied Check and redirrect to login -->

<div id="main" class="site-main">
    <!-- Begin Header Region -->
    <?php print render($page['header']); ?>
    <?php include $directory . '/templates/includes/header.tpl.inc'; ?>
    <!-- End Header Region -->

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

    <?php if ($page['secondary_menu']) : ?>
    <div id="secondary-menu">
        <?php print render($page['secondary_menu']); ?>
    </div>
    <?php endif; ?>

  <!--  Begin of primary -->
  <div id="primary" class="web-app-content-area">
    <div id="content" class="site-content site-content wide" role="main">

      <!-- Begin Breadcrumb Region -->
        <?php if (!drupal_is_front_page()) : ?>
        <div class="breadcrumb">
            <?php print strip_tags($breadcrumb, '<a><h2>') . ' » ' . html_entity_decode($title);?>
        </div>
        <?php endif; ?>
      <!-- End Breadcrumb Region -->

      <!-- Begin Message Region -->
        <?php
        if ($messages) : ?>
          <div id="message">
            <div class="section clearfix">
                <?php print $messages; ?>
            </div>
          </div>
        <?php endif; ?>
      <!-- End Message Region -->

      <!-- Begin Help Region -->
        <?php if ($page['help']) : ?>
        <div id="help">
            <?php print render($page['help']); ?>
        </div>
        <?php endif; ?>
      <!-- End Help Region -->

      <!-- Begin highlighted Region -->
        <?php if ($page['highlighted']) : ?>
        <div id="highlighted">
            <?php print render($page['highlighted']); ?>
        </div>
        <?php endif; ?>
      <!-- End highlighted -->

      <!-- Anchor for accessibility -->
      <a id="main-content"></a>

      <!-- Begin title Region -->
        <?php if ($title) : ?>
        <?php print render($title_prefix); ?>
        <h1 class="title" id="page-title">
            <?php print html_entity_decode($title); ?>
        </h1>
        <?php print render($title_suffix); ?>
        <?php endif; ?>
      <!-- End tite -->

      <!-- Begin tabs -->
        <?php if ($tabs) : ?>
        <div class="tabs">
            <?php print render($tabs); ?>
        </div>
        <?php endif; ?>
      <!-- End tabs -->

      <!-- Begin help -->
        <?php if ($page['help']) : ?>
        <?php print render($page['help']); ?>
        <?php endif; ?>
      <!-- End help -->

      <!-- Begin action_links -->
        <?php if ($action_links) : ?>
        <ul class="action-links">
            <?php print render($action_links); ?>
        </ul>
        <?php endif; ?>
      <!-- End action_links -->

      <!-- Begin content -->
        <?php if ($page['content']) : ?>
            <?php print render($page['content']); ?>
        <?php endif; ?>
      <!-- End content -->

      <!-- Begin feed_icons -->
        <?php if ($feed_icons) : ?>
        <?php print $feed_icons; ?>
        <?php endif; ?>
      <!-- Begin feed_icons -->

      <!-- Begin sidebar_first -->
        <?php if ($page['sidebar_first']) : ?>
        <div id="sidebar-first" class="column sidebar">
          <div class="section">
            <?php print render($page['sidebar_first']); ?>
          </div>
        </div>
        <?php endif; ?>
      <!-- End sidebar_first -->

      <!-- Begin sidebar_second -->
        <?php if ($page['sidebar_second']) : ?>
        <div id="sidebar-second" class="column sidebar">
          <div class="section">
            <?php print render($page['sidebar_second']); ?>
          </div>
        </div>
        <?php endif; ?>
      <!-- End sidebar_second -->
    </div>
    <!-- End contain main -->

    <!-- Begin Footer Region -->
    <?php if ($page['footer']) : ?>
        <?php print render($page['footer']); ?>
    <?php endif; ?>
    <!-- End Footer Region -->
  </div>
  <!-- End of primary -->
</div>
<!-- End main -->
<!-- End page.tpl.php template -->

<!--  Closing div to wrap top and main together-->
</div>
