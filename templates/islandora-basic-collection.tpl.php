<?php

/**
 * @file
 * islandora-basic-collection.tpl.php
 *
 * @TODO: needs documentation about file and variables
 */
?>

<div class="islandora islandora-basic-collection">
    <?php $row_field = 0; ?>

    <?php foreach($associated_objects_array as $associated_object): ?>

      <div>
      <div class="islandora-basic-collection-object islandora-basic-collection-list-item clearfix">
        <dl class="<?php print $associated_object['class']; ?>">

            <!--  Title -->
            <dd class="collection-value <?php print isset($associated_object['dc_array']['dc:title']['class']) ? $associated_object['dc_array']['dc:title']['class'] : ''; ?> <?php print $row_field == 0 ? ' first' : ''; ?>">
              <?php if (isset($associated_object['thumb_link'])): ?>
                <strong><?php print filter_xss($associated_object['title_link']); ?></strong>
              <?php endif; ?>
            </dd>

            <!-- Date of Award -->
            <?php if (isset($associated_object['dc_array']['dc:date']['value'])): ?>
                <dd class="collection-value <?php print $associated_object['dc_array']['dc:date']['class']; ?>">
                    <?php
                    $date = explode(",", $associated_object['dc_array']['dc:date']['value']);
                    print filter_xss($date[0]); ?>
                </dd>
            <?php endif; ?>

            <!-- DC description(s) -->
            <?php if (isset($associated_object['dc_array']['dc:description']['value'])): ?>
              <dd class="collection-value <?php print $associated_object['dc_array']['dc:description']['class']; ?>">
                <?php print filter_xss($associated_object['dc_array']['dc:description']['value']); ?>
              </dd>
            <?php endif; ?>

        </dl>
      </div>

    <?php $row_field++; ?>
    <?php endforeach; ?>
</div>
