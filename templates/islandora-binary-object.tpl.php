<?php

/**
 * @file
 * This is the template file for the object page for binary objects.
 *
 * Available variables:
 * - $islandora_object: The Islandora object rendered in this template file.
 * - $islandora_binary_object_info: Information about the binary object.
 * - $islandora_thumbnail_img: The thumbnail image of the binary object.
 * - $islandora_binary_object_download: Download link for the object.
 * - $description: Defined metadata descripton for the object.
 * - $parent_collections: Parent collections of the object if applicable.
 * - $metadata: Rendered metadata display for the binary object.
 *
 * @see template_preprocess_islandora_binary_object()
 * @see theme_islandora_binary_object()
 */
?>
  <div class="islandora-binary-object-metadata">
    <?php
      print strlen($description);
    ?>
    <?php if ($parent_collections) : ?>
      <div>
        <h2><?php print t('In collections'); ?></h2>
        <ul>
            <?php foreach ($parent_collections as $collection) : ?>
            <li><?php print l($collection->label, "islandora/object/{$collection->id}"); ?></li>
            <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
    <?php print $metadata; ?>
  </div>
<div class="islandora-binary-object-object islandora">
  <div class="islandora-binary-object-content-wrapper clearfix">
    <?php if (isset($islandora_binary_object_info)) : ?>
        <?php print $islandora_binary_object_info; ?>
    <?php endif; ?>

    <?php if (isset($islandora_binary_object_download)) : ?>
        <?php
          // Shorten the file name to fit into the sidebar.
          // $resultingfile = preg_match_all('/\">(.*?)<\/a>/', $islandora_binary_object_download, $results);
          // $resultingfileString = substr($results[0][0], 2, 3) . '...' . substr($results[0][0], strlen($results[0][0]) - 11, -4);
          // $resulting = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', '<a href="\\1">' . $resultingfileString . '</a>', $islandora_binary_object_download);
          // print $resulting;
          print $islandora_binary_object_download;
        ?>
    <?php endif; ?>
  </div>

</div>

<?php if (isset($islandora_object->label)) {
    drupal_set_title($islandora_object->label);
}
?>
