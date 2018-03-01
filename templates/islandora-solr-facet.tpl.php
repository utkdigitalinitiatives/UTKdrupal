<?php

/**
 * @file
 * Template file for default facets
 *
 * @TODO document available variables
 */
// $total_facets = count($buckets);
?>

<!-- BEGIN islandora-solr-facet.tpl.php -->

<ul role="listbox" class="<?php print $classes; ?>">
    <?php foreach($buckets as $key => $bucket) : ?>
    <li role="option">

      <?php print $bucket['link']; ?>
      <span class="count">(<?php print $bucket['count']; ?>)</span>

      <span class="plusminus">

        <span class="plus_facet">
          <?php print $bucket['link_plus']; ?>
          <span role="tooltip" name="tooltipTextPlusText" aria-hidden="true" class="tooltiptext_plus">contains</span>
        </span>

        <span class="minus_facet">
          <?php print $bucket['link_minus']; ?>
          <span role="tooltip" name="tooltipTextMinusTest" aria-hidden="true" class="tooltiptext_minus">excludes</span>
        </span>

      </span>

    </li>
  <?php endforeach; ?>
</ul>
<!-- END islandora-solr-facet.tpl.php -->
