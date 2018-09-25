<?php
/**
 * @file
 * Template file to style output.
 * add code for link to View/Download PDF per DIT-370
 */
?>

<?php 
    print t('<hr /><p />');
    $obj_id = $object->id;
    $obj_id2 = str_replace(':','%3A',$obj_id);
    $DOLLAR  = '&#036;';
    $COLON = '&#058;';
    $link_prefix = 'http://digital.lib.utk.edu/collections/islandora/object/'.$obj_id2;
    /* print t($DOLLAR.'link_prefix = '.$link_prefix.' --C-- <p /> '); */
    $PDFurl = $link_prefix.'/datastream/PDF/view';
    $PDFtarget = $PDFurl.' target="_blank" ';
    if (isset($object['PDF'])){
        print t('<a href='.$PDFtarget.' >View/Download PDF</a>  <p />');
	print t('<hr />');

  } 
   
  
?>



<?php if(isset($viewer)): ?>
  <div id="book-viewer">
    <?php print $viewer; ?>
  </div>
<?php endif; ?>

<?php if($display_metadata === 1): ?>
  <div class="islandora-book-metadata">
    <?php print $description; ?>
    <?php if($parent_collections): ?>
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
<?php endif; ?>
