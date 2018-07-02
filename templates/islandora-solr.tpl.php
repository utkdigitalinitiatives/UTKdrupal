<?php
/**
 * @file
 * Islandora solr search primary results template file.
 *
 * Variables available:
 * - $results: Primary profile results array
 *
 * @see template_preprocess_islandora_solr()
 */
?>

<!-- BEGIN islandora-solr.tpl.php -->
<?php if (empty($results)) : ?>
    <p class="no-results"><?php print t('Sorry, but your search returned no results.'); ?></p>
        <?php else: ?>
        <div class="islandora islandora-solr-search-results">
            <?php $row_result = 0; ?>
            <?php foreach ($results as $key => $result) : ?>
            <!-- Search result -->
            <div class="islandora-solr-search-result clear-block <?php print $row_result % 2 == 0 ? 'odd' : 'even'; ?>">
             <div class="islandora-solr-search-result-inner">
               <!-- Metadata -->
               <dl class="solr-fields islandora-inline-metadata">
                    <?php foreach ($result['solr_doc'] as $key => $value) : ?>
                    <dt class="solr-label <?php print $value['class']; ?>">
                    <?php
                    print $value['label'] != 'Description' ? $value['label'] : 'Abstract/Description';
                    ?>
                    </dt>
                    <dd class="solr-value <?php print $value['class']; ?>">
  			<?php 
				if (strpos($value['value'],'PDF') !== false) {
				$rawval = $value['value'];
				$rawpid0 = str_replace("info:fedora/","",$rawval);
				$rawpid1 = str_replace("/PDF","",$rawpid0);
				$rawpid2 = str_replace(";","%3A",$rawpid1);
				$anchor_prefix = '<a href="/islandora/object/';
				$anchor_suffix = '/datastream/PDF/download/citation.pdf">PDF</a>';
				$anchor_tag    = $anchor_prefix.$rawpid2.$anchor_suffix;
				print $anchor_tag;
                                /*


				*/
				} else {
                        	 print $value['value']; 
				}
			?>
                    </dd>
                    <?php endforeach; ?>
                </dl>
              </div>
            </div>
            <?php $row_result++; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
<!-- END islandora-solr.tpl.php -->
