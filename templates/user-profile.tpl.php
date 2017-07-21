<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 * <div class="profile"<?php print $attributes; ?>>
 * <?php print render($user_profile); ?>
 */
?>
<hr>
<div class="profile"<?php print $attributes; ?>>
<?php
  if ($user_profile): ?>
    <?php print render($user_profile); ?>
  <?php endif; ?>
<?php
$my_login_user_name = $user->name;
$my_sparql_submissions = <<<SPARQL
SELECT DISTINCT ?pid ?label ?aproval
WHERE { ?pid <info:fedora/fedora-system:def/model#label> ?label .
        ?pid <info:fedora/fedora-system:def/model#ownerId> '$my_login_user_name' .
        ?pid <fedora-model:state> ?aproval .
  }
SPARQL;

$query = db_query("SELECT pid, state FROM {trace_workflow_pids}");
$records = $query->fetchAll();
$not_aproved_yet = array();
foreach ($records as $record) {
  if($record->state == 'a') {
    array_push($not_aproved_yet, $record->pid);
  }
}

$tuque = islandora_get_tuque_connection();
$ri_search = $tuque->repository->ri->sparqlQuery($my_sparql_submissions);
$islandora_user_submission_list = "<table class='islandora_user_submission_list'><tr><th>Title</th><th>Aproval Status</th><th>Availability Status</th></tr>";
$needs_approval = count($ri_search);
foreach ($ri_search as $resultItem) {
  $publish_status = "<td>Not yet published</td>";
  $approval_status = "<td>Not Approved yet</td>";
  if ($resultItem['aproval']['value'] == 'fedora-system:def/model#Active'){
    $publish_status = "<td>Published</td>";
  }
  if (in_array($resultItem['pid']['value'], $not_aproved_yet)) {
    $approval_status = "<td>Approved!</td>";
    --$needs_approval;
  }
  $islandora_user_submission_list .= "<tr><td><a href='/islandora/object/" . $resultItem['pid']['value'] . "'>" . $resultItem['label']['value'] . "</a></td>" . $approval_status . $publish_status . "</tr>";
}
$islandora_user_submission_list .= "</table>\n";
?>
  <h1>List of My Submissions</h1>
  <div>
    <p>Currently <span style="font-weight:bold;">
      <?php print $needs_approval ?></span>
      <?php if ($needs_approval === 1) {
        print "is";
      } else {print "are";
      } ?> waiting for approval</p>
  <?php print $islandora_user_submission_list ?>
  <br/><br/>
  </div>
  <hr>
  <div id="user-profile">
    <h2>Submit Your Work</h2>
    <div style="line-height: 2.0; font-size: larger;">
    <ul style="list-style: none;">
        <li style="padding-bottom:10px;"><a href="/islandora/object/utk.ir:td/manage/overview/ingest">Submit Graduate Thesis or Dissertation</a></li>
        <li style="padding-bottom:10px;"><a href="/islandora/object/utk.ir:fg/manage/overview/ingest">Submit Faculty and Graduate Student Research and Creative Work</a></li>
        <li style="color: #A7A9AC;">Submit Undergraduate Research Projects</li>
        <ul style="list-style: none;">
          <li><a href="/islandora/object/utk.ir:bsp/manage/overview/ingest">Baker Scholars Program</a></li>
          <li><a href="/islandora/object/utk.ir:chp/manage/overview/ingest">Chancellor’s Honors Program</a></li>
          <li><a href="/islandora/object/utk.ir:csp/manage/overview/ingest">College Scholars Program</a></li>
          <li><a href="/islandora/object/utk.ir:eureca/manage/overview/ingest">EUReCA: Exhibition of Undergraduate Research and Creative Achievement</a></li>
          <li style="padding-bottom:10px;"><a href="/islandora/object/utk.ir:hsp/manage/overview/ingest">Haslam Scholars Program</a></li>
        </ul>
        <li style="padding-bottom:10px;"><a href="/help">Help, I’m not sure.</a></li>
    </ul>
    </div>
  </div>
</div>
