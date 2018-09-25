<?php

/**
 * @file
 * This is the template file for the object page for large image
 *
 * Available variables:
 * - $islandora_object: The Islandora object rendered in this template file
 * - $islandora_dublin_core: The DC datastream object
 * - $dc_array: The DC datastream object values as a sanitized array. This
 *   includes label, value and class name.
 * - $islandora_object_label: The sanitized object label.
 * - $parent_collections: An array containing parent collection(s) info.
 *   Includes collection object, label, url and rendered link.
 * - $islandora_thumbnail_img: A rendered thumbnail image.
 * - $islandora_content: A rendered image. By default this is the JPG datastream
 *   which is a medium sized image. Alternatively this could be a rendered
 *   viewer which displays the JP2 datastream image.
 *
 * @see template_preprocess_islandora_large_image()
 * @see theme_islandora_large_image()
 */
?>
<div class="islandora-large-image-object islandora" vocab="http://schema.org/" prefix="dcterms: http://purl.org/dc/terms/" typeof="ImageObject">
  <div class="islandora-large-image-content-wrapper clearfix">
   <?php if (!$islandora_content): ?>
      <?php if (!user_is_logged_in() && strpos(trim(parse_url(current_path())['path'], '/object/'), 'archivision', 1) !== 0): ?>
	<p id='limited_access'>
	   <?php print l('Limited Access: Log in for full access.', "login", array('query' => drupal_get_destination(), 'html' => TRUE, 'attributes' => array('class' => 'isDisabled')));  ?>
	</p>
	<?php print l(t('<img id="limited_access" class="archivision_overlay" src="@baseurl@url/datastream/TN/view/" />', array('@baseurl' => base_path(), '@url' => current_path())), "login", array('query' => drupal_get_destination(), 'html' => TRUE, 'attributes' => array('class' => 'isDisabled')));  ?>
	  <div class="limited-access-msg center-block clearfix">
	   <div class="limited-access-msg-title-field">
              <span class="access-lock"></span><span class="restricted-access-warning-title">Restricted Access</span>
 	   </div>
	   <div class="limited-access-msg-text">
              <span class="limited-access-msg-inner">Viewing and download available to UTK community members only.</span>
              <span class="limited-access-learn-more"><a href="http://www.lib.utk.edu/about/policies/electronic-resource-use/">Learn more.</a></span>
  	   </div>
           <div class="limited-access-msg-login pull-right">
	      <?php print l('Log In', "login", array('query' => drupal_get_destination(), 'html' => TRUE, 'attributes' => array('class' => 'isDisabled')));  ?>
       	   </div>
	</div>

	<div class="form-item form-type-item">
	   <label>Downloads</label>
	      <div id=outer>
		<div id=inner>
		   <?php print l('Full Resolution Image (TIFF)', "login", array('query' => drupal_get_destination(), 'html' => TRUE, 'attributes' => array('class' => 'isDisabled')));  ?><br/>
		   <?php print l('Standard Resolution Image (JPG)', "login", array('query' => drupal_get_destination(), 'html' => TRUE, 'attributes' => array('class' => 'isDisabled')));  ?><br/>
		</div>
	      </div>
	   </div>
      <?php endif; ?>
   <?php endif; ?>
    <?php if ($islandora_content): ?>
      <?php if (isset($image_clip)): ?>
        <?php print $image_clip; ?>
      <?php endif; ?>
      <div class="islandora-large-image-content">
        <?php print $islandora_content; ?>
      </div>
	<?php if (strpos(current_path(), 'archivision') ): ?>
	   <div class="form-item form-type-item">
              <label>Downloads</label>
              <div id=outer>
                 <div id=inner>
		   <?php print l('Full Resolution Image (TIFF)', t("@url/datastream/OBJ/view/", array('@baseurl' => base_path(), '@url' => current_path())), array('html' => TRUE));  ?><br/>
		   <?php print l('Standard Resolution Image (JPG)', t("@url/datastream/JPG/view/", array('@baseurl' => base_path(), '@url' => current_path())), array('html' => TRUE));  ?><br/>
                 </div>
              </div>
          </div>
	<?php endif; ?>
    <?php endif; ?>
  </div>
  <div class="islandora-large-image-metadata">
    <?php print $description; ?>
    <?php if ($parent_collections): ?>
      <div>
        <h2><?php print t('In collections'); ?></h2>
        <ul>
          <?php foreach ($parent_collections as $collection): ?>
        <li><?php print l($collection->label, "islandora/object/{$collection->id}"); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
    <?php print $metadata; ?>
  </div>
</div>
