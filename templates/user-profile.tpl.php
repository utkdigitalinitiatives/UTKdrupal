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
<hr><br/>
<div class="profile"<?php print $attributes; ?>>
 <?php print render($user_profile); ?>
</div>  
<h1>List of my submissions</h1>
<div><p>Currently <span style="font-weight:bold;">0</span> are pending</p><br/><br/>
</div>
<hr>
<br/>
<div id="user-profile">
  <h2>Deposit Your Work</h2>
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
