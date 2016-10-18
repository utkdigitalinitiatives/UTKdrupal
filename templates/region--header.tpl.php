<?php ?>

<!-- The UT Header begins here. -->
<!-- Will remove orange bar later for semantic html -->
<div id="orange-bar"></div>
  
<div id="page">
	<div id="main">
	<a class="sr-only" href="#content" title="Skip to content">Skip to content</a>	    

	  <header id="ut-header" role="banner">
	  <h3 class="killer-logo"><a href="http://www.utk.edu">The University of Tennessee, Knoxville</a></h3>
	  	<h2 class="sr-only"><a href="https://www.lib.utk.edu" rel="home">University Libraries</a></h2>
        
	  	<div id="site-title">
	  	<h2><a href="https://www.lib.utk.edu" title="University Libraries" rel="home">University Libraries</a></h2>
		</div>
         
<!-- Begin Copied from Drupal system page.tpl header area line 86 to 104 -->

<?php if ($site_name || $site_slogan): ?>
<div id="name-and-slogan">
<?php if ($site_name): ?>
<?php if ($title): ?>
        <div id="site-name">
	              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong></div>
            <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>
<!-- End Copied from Drupal system page.tpl header area line 86 to 104 -->
</header>
<!-- The UT Header ends here. -->