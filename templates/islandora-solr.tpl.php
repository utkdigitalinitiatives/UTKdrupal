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
<?php if (empty($results)): ?>
  <p class="no-results"><?php print t('Sorry, but your search returned no results.'); ?></p>
<?php else: ?>
<!-- <?php var_dump($results); ?> -->
  <div class="islandora islandora-solr-search-results">
    <?php $row_result = 0; ?>
    <?php foreach($results as $key => $result): ?>
      <!-- Search result -->
      <div class="islandora-solr-search-result clear-block <?php print $row_result % 2 == 0 ? 'odd' : 'even'; ?>">
        <div class="islandora-solr-search-result-inner">
          <!-- Metadata -->
          <dl class="solr-fields islandora-inline-metadata">
            <?php foreach($result['solr_doc'] as $key => $value): ?>
              <dt class="solr-label <?php print $value['class']; ?>">
                <?php
                print $value['label'] != 'Title' ? $value['label']: 'Abstract/Description';
                ?>
              </dt>
              <dd class="solr-value <?php print $value['class']; ?>">
                <?php print $value['value']; ?>
              </dd>
            <?php endforeach; ?>
          </dl>
        </div>
      </div>
    <?php $row_result++; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
