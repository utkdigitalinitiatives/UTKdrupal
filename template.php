<?php
/**
 * @file
 * Template.php - functions to manipulate Drupal's default markup.
 *
 * Drupal Print Message drupal_set_message()
 *   dpm($input, $name = NULL);
 * Drupal Variable Dump
 *   dvm($input, $name = NULL);
 *   dsm($form_id);
 * Drupal Pretty-Print prints to browser
 *   dpr($input, $return = FALSE, $name = NULL);
 * Drupal arguments
 *   dargs();
 * dd();
 * ddebug_backtrace();
 * db_queryd($query, $args = array());
 *
 * Additional Examples of functions
 * function UTKdrupal_preprocess_region(&$variables) {
 *   // Region preprocessing, switch on region name in var's, $variables['region']  <-name
 * }
 * function UTKdrupal_js_alter(&$javascript) {
 * }
 * function UTKdrupal_css_alter(&$css) {
 * }

 *
 * Modify any theme hooks variables or add your own variables, using preprocess or process functions.
 * Override any theme function. That is, replace a module's default theme function with one you write.
 * Call hook_*_alter() functions which allow you to alter various parts of Drupal's internals, including
 * the render elements in forms. The most useful of which include hook_form_alter(),
 * hook_form_FORM_ID_alter(), and hook_page_alter(). See api.drupal.org for more information about
 * _alter functions. Or link to this file's description https://www.drupal.org/node/1728096
*/

/**
 * Pragma (HTTP/1.0) and cache-control (HTTP/1.1) Prevent the client from caching the response.
 * @method UTKdrupal_page_headers
 */
function UTKdrupal_page_headers(){
  drupal_set_html_head('<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">');
  drupal_set_html_head('<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">');
}

/**
 * Adds the CSS file for IE
 * Check if the user (anonymous user) had access to the PDF (it shouldn't if it's anonymous or anyone not the owner)
 * Check if the URL contains "/datastream/PDF/download/citation.pdf"
 * Unsets the normal 404/403 redirects
 * Redirects to the same URL excluding this string "/datastream/PDF/download/citation.pdf"
 */
function UTKdrupal_preprocess_html(&$vars) {
  drupal_add_css(path_to_theme() . '/ie.css', array('weight' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));

  $current_url = current_path();
  if (!drupal_valid_path($current_url)) {
    if (strpos($current_url, '/datastream/PDF/download/citation.pdf') !== false) {
      $link = str_replace("/datastream/PDF/download/citation.pdf", "", 'https://trace.utk.edu' . $current_url);
      unset($_GET['destination']);
      drupal_goto($link);
    }
  }
}

/**
 * function extractStringValue($large_string,$unique_tag)
 * Small utility to parse out a field value from the Details section of an Object Level Page.
 * $large_string is any string you want to search.
 *
 * For the citation_author search, $large_value is defined as the value from:
 * $variables['page']['content']['system_main']['citation.tab']['metadata']['#markup']
 *
 * Very simple php parsing is used.
 *
 * Assumptions:
 *  large_string contains the unique_tag and the target_value
 *  unique_tag occurs only once in large_string
 *  target_value occurs only once in large_string
 *  unique_tag occurs before target_value
 *  unique_tag occurs before '>' character
 *  target_value occurs between '>' and '<' characters.
 *
 * Example: target value is displayed in standard html as below.
 * blah blah<html blah blah unique_tag blah blah>target_value</more html>
 *
 * function call example:
 * $AUTHOR = extractStringValue($thisDetails,'utk_mods_etd_name_author_ms');
 *
 */

function extractStringValue($large_string,$unique_tag){

      $posit01   = strpos($large_string,$unique_tag);
      $parse3b   = substr($large_string,$posit01,400);
      $posit02   = strpos($parse3b,'>');
      $parse3c   = substr($parse3b,$posit02,200);
      $posit03   = strpos($parse3c,'<');
      $mySTRLEN  = $posit03-1;
      $parse3d   = substr($parse3c,1,$mySTRLEN);
      $target_value  = $parse3d;
      return $target_value;
}

/**
 * Set Logo path and $head variable in page.tpl.php is updated from what it was originally set to in template_preprocess_page().
 * @method UTKdrupal_preprocess_page
 * @param  [type]                    $variables Page variables
 * @param  [type]                    $hook      URL Hooks
 */
function UTKdrupal_preprocess_page(&$variables, $hook) {
  global $base_path;
  $variables['logopath'] = $base_path.'/' . drupal_get_path('theme','UTKdrupal') . '/logo.png';
  /* if(drupal_is_front_page()) {
    drupal_set_html_head('');
    $variables['head'] = drupal_get_html_head();
  } */
  $header = drupal_get_http_header("status");
  if($header == "404 Not Found") {
    $variables['theme_hook_suggestions'][] = 'page__404';
  }
  if($header == "403 Forbidden") {
    $variables['theme_hook_suggestions'][] = 'page__404';
  }
  // Possible to improve code size by using arg(2) vs strpos(current_path(), 'utk.ir.td:')
  // ETD overrides
  if (strpos(current_path(), 'utk.ir.td') !== false) {
    if ( isset($variables['page']['content']['system_main']['citation.tab']['preview']['#markup'])) {
      unset($variables['page']['content']['system_main']['citation.tab']['preview']['#markup']);
    }
  }

  // Adds view and download count to screen.
  module_load_include('inc', 'islandora', 'includes/utilities');

  // Retrieve the object.
  $parsed_request = explode('/', $_SERVER['REQUEST_URI']);

  // PID check to see if this is an object or not.
  if (islandora_is_valid_pid(urldecode(end($parsed_request))) && user_access('access usage stats callbacks api')) {
    $variables['page']['islandora_object'] = islandora_object_load(urldecode(end($parsed_request)));
    if(!isset($variables['page']['islandora_object']['COLLECTION_POLICY']))
    {
      $islandora_object = $variables['page']['islandora_object'];
      if (!is_null($islandora_object) && module_exists('islandora_usage_stats_callbacks') && $islandora_object->state == 'A') {
        global $base_url;
        $usage_stats_json = file_get_contents("{$base_url}/islandora_usage_stats_callbacks/object_stats/{$islandora_object->id}");
        $usage_stats_array = json_decode($usage_stats_json, TRUE);
        if (sizeof($usage_stats_array) > 0
            && array_key_exists('views', $usage_stats_array)
            && array_key_exists('legacy_views', $usage_stats_array)
            && array_key_exists('legacy-downloads', $usage_stats_array)
            && array_key_exists('downloads', $usage_stats_array) ) {
                $views = count($usage_stats_array['views']) + $usage_stats_array['legacy-views'];
                $downloads = count($usage_stats_array['downloads']) + $usage_stats_array['legacy-downloads'];
                $usage_data = array('views' => $views, 'downloads' => $downloads);
                $variables['page']['object_cmodel'] = $usage_stats_array['cmodel'];
                $variables['page']['usage_views'] = $usage_data['views'];
                $variables['page']['usage_downloads'] = $usage_data['downloads'];
                $string_something = '<div id="usage-stats-box"><span class="usage-stats-views">' . $usage_data['views'] . ' views</span><br><span class="usage-stats-downloads">' . $usage_data['downloads'] . ' downloads</span></div>';
                $variables['page']['content']['system_main']['citation.tab']['pdf_download']['#suffix'] = $string_something;
        }
      }
    }
  }
  // End of view download count display.

    // This is a temporary template correction to redirect non-migrated collections to their current locations.
    if (drupal_get_path_alias() == 'browse') {
        $new_markup="<ul class='islandora_nested_collection_0'>
        <li><a href='/islandora/object/utk.ir%3Afg'>Datasets</a></li>
        <li><a href='http://trace.tennessee.edu/communities.html'>Faculty and Graduate Student Research and Creative Work</a></li>
        <li><a href='https://trace.tennessee.edu/utk-grad'>Graduate Theses and Dissertations</a></li>
        <li><a href='http://trace.tennessee.edu/submit_research.html'>Supervised Undergraduate Student Research and Creative Work</a></li>
        <ul class='islandora_nested_collection_1'>
        <li><a href='http://trace.tennessee.edu/utk_bakerschol/'>Baker Scholars Program</a></li>
        <li><a href='http://trace.tennessee.edu/utk_chanhonoproj/'>Chancellor’s Honors Program</a></li>
        <li><a href='http://trace.tennessee.edu/utk_intercsch/'>College Scholars Program</a></li>
        <li><a href='http://trace.tennessee.edu/utk_eureca/'>EUReCA: Exhibition of Undergraduate Research and Creative Achievement</a></li>
        <li><a href='http://trace.tennessee.edu/utk_haslamschol/'>Haslam Scholars Program</a></li>
        </ul>
        </ul>";
        if ( isset($variables['page']['content']['islandora_nested_collections_nested_collections_list']['#markup'])) {
            unset($variables['page']['content']['islandora_nested_collections_nested_collections_list']['#markup']);
            $variables['page']['content']['islandora_nested_collections_nested_collections_list']['#markup'] = $new_markup;
        }
    }


  if (strpos(current_path(), 'utk.ir.td') !== false) {
    if ( isset($variables['page']['content']['system_main']['citation.tab']['citation']['#markup'])) {
      unset($variables['page']['content']['system_main']['citation.tab']['citation']['#markup']);

      //Generate display of Author name in first line below title
      $thisDetails = $variables['page']['content']['system_main']['citation.tab']['metadata']['#markup'];
      $Author      = extractStringValue($thisDetails,'utk_mods_etd_name_author_ms');
      $prefix      = '<div class="csl-bib-body"><div class="citation_author_container"><div class="citation_author"><h4>';
      $content     = $Author;
      $suffix      = '</h4></div></div></div>';
      $new_string  = $prefix.$content.$suffix;
      $variables['page']['content']['system_main']['citation.tab']['citation']['#markup']= $new_string;
      //Change font size on Abstract Header, add citation div wrappers
      $count1        = 1;
      $count2        = 2;
      $thisAbstract  = str_replace('h2>','h5>',$thisDetails,$count2);
      $thisAbstract2 = str_replace('<h5>','<div class="citation_abstract_container"><h5>',$thisAbstract);
      $thisAbstract3 = str_replace('<p property="description"><p>','<p property="description"><p class="citation_abstract">',$thisAbstract2);
      $thisAbstract4 = str_replace('<!-- END','</div><!-- END',$thisAbstract3,$count1);
      $variables['page']['content']['system_main']['citation.tab']['metadata']['#markup']= $thisAbstract4;
    }
  }

}


/**
 * Change the text on the label element, Toggle label visibilty, define size of
 * the textfield, Set a default value for the textfield, Add extra attributes to
 * the text box, Prevent user from searching the default text, Alternative
 * (HTML5) placeholder attribute instead of using the javascript
 * @method UTKdrupal_form_search_block_form_alter
 * @param  [type]                                 $form       Form Name
 * @param  [type]                                 $form_state Form State Name
 * @param  [type]                                 $form_id    Node ID
*/
 /**
 * hook_form_FORM_ID_alter
 */
function UTKdrupal_form_search_block_form_alter(&$form, &$form_state, $form_id) {
    $form['search_block_form']['#title'] = t('Search');
    $form['search_block_form']['#title_display'] = 'invisible';
    $form['search_block_form']['#size'] = 20;
    $form['search_block_form']['#default_value'] = t('Search');
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
}


/**
 * `Progress Bar on top of the Submission Form`
 * @method UTKdrupal_form_alter
 * @param  [type]               $form       Form Name
 * @param  [type]               $form_state Form State Name
 * @param  [type]               $form_id    Node ID for the form
 */

/*
 * Implementation of hook_form_alter()
 */
function UTKdrupal_form_alter(&$form, &$form_state, $form_id) {
  // Use this to debug the form.
  $possibleForms = array('xml_form_builder_ingest_form', 'islandora_scholar_pdf_upload_form');
  if(in_array($form_id, $possibleForms, true)) {
    $formStage = "progress-current";
    $formStage2 = "progress-todo";
    if($form_id == 'islandora_scholar_pdf_upload_form') {
      $formStage = "";
      $formStage2 = "progress-done progress-current";
    }
    $form['#prefix'] = '<div class="entityform-form-elements">
      <ol class="progress-track">
        <li class="progress-done">
          <center>
            <div class="icon-wrap">
              <svg class="icon-state icon-down-arrow" viewBox="0 0 512 512">
            <path d="m479 201c0 10-4 19-11 26l-186 186c-7 7-16 11-26 11c-10 0-19-4-26-11l-186-186c-7-7-11-16-11-26c0-10 4-19 11-26l21-21c8-7 17-11 26-11c11 0 19 4 26 11l139 139l139-139c7-7 15-11 26-11c9 0 18 4 26 11l21 21c7 8 11 16 11 26z"></path>
                <use xlink:href="#icon-check-mark"></use>
              </svg>
            </div>
            <span class="progress-text">Begin submission</span>
          </center>
        </li>
        <li class="progress-done ' . $formStage . '">
          <center>
            <div class="icon-wrap">
            <svg class="icon-state icon-down-arrow" viewBox="0 0 512 512">
          <path d="m479 201c0 10-4 19-11 26l-186 186c-7 7-16 11-26 11c-10 0-19-4-26-11l-186-186c-7-7-11-16-11-26c0-10 4-19 11-26l21-21c8-7 17-11 26-11c11 0 19 4 26 11l139 139l139-139c7-7 15-11 26-11c9 0 18 4 26 11l21 21c7 8 11 16 11 26z"></path>
              <use xlink:href="#icon-check-mark"></use>
            </svg>
            </div>
            <span class="progress-text">Description</span>
          </center>
        </li>
        <li class="' . $formStage2 . '">
          <center>
            <div class="icon-wrap">
            <svg class="icon-state icon-down-arrow" viewBox="0 0 512 512">
          <path d="m479 201c0 10-4 19-11 26l-186 186c-7 7-16 11-26 11c-10 0-19-4-26-11l-186-186c-7-7-11-16-11-26c0-10 4-19 11-26l21-21c8-7 17-11 26-11c11 0 19 4 26 11l139 139l139-139c7-7 15-11 26-11c9 0 18 4 26 11l21 21c7 8 11 16 11 26z"></path>
                <use xlink:href="#icon-check-mark"></use>
              </svg>
            </div>
            <span class="progress-text">Upload Files</span>
          </center>
        </li>
        <li class="progress-todo">
          <center>
            <div class="icon-wrap">
              <svg class="icon-state icon-check-mark">
                <use xlink:href="#icon-check-mark"></use>
              </svg>
            </div>
            <span class="progress-text">Submitted for Review</span>
          </center>
        </li>
      </ol>';
    }
    global $user;
      foreach($user->roles as $user_role):
        if (($user_role == 'authUser-role') && (count($user->roles)==2)) {
          drupal_get_messages('warning');
        }
      endforeach;
      // TRAC-901 /manage/overview/ingest for Add Supplemental Files (Optional)
      if (isset($form['optional_supplemental'])) {
        if ($form['optional_supplemental']['#markup']=='<h1>Add Supplemental Files (Optional)</h1>'){
          $form['optional_supplemental']['#markup']='<legend><span class="fieldset-legend">Add Supplemental Files (Optional)</span></legend><span class="help-block">If you have very large files (such as maps, spreadsheets, or architectural drawings) or multimedia objects (such as digital video, audio, or datasets) that need to be published alongside your thesis/dissertation but cannot be included in the document itself, you should upload them here.<br/><br/>Supplemental files, also known as attachments, will be made public with your final thesis/dissertation. Therefore you should not upload your actual thesis/dissertation as a Word document or any other file format here. If you are unsure about whether or not what you are uploading constitutes a supplemental file, please contact thesis@utk.edu before submitting it.</span>';
        }
    }
  return $form;
}

/**
 * This needs to be deleted.
 * @method UTKdrupal_preprocess_islandora_large_image
 * @param  [type]                                     $variables [description]
 */
/**
 * Implements hook_preprocess().
 */
function UTKdrupal_preprocess_islandora_large_image(&$variables) {
  $variables['large_image_preprocess_function_variable'] = "TESTING LARGE IMAGE PREPROCESS FUNCTION IN THEME";
}

/**
 * Adds a placeholder attribute to the search query
 * @method UTKdrupal_form_islandora_solr_simple_search_form_alter
 * @param  [type]                                                 $form       Form Name
 * @param  [type]                                                 $form_state Form State Name
 * @param  [type]                                                 $form_id    Node ID for the Form
 */
/**
 * Implements hook_form_alter().
 */
function UTKdrupal_form_islandora_solr_simple_search_form_alter(&$form, &$form_state, $form_id) {
  $form['simple']['islandora_simple_search_query']['#attributes']['placeholder'] = t("Search Repository");
}


/**
 * From here, we can do something entirely different for this particular collection, based on PID
 * Editing or adding to the variables array here will make it available in the overridden template,
 * In this case, 'islandora-basic-collection-wrapper--islandora-sp-basic-image-collection.tpl.php'
 * @method UTKdrupal_preprocess_islandora_basic_collection_wrapper__islandora_sp_basic_image_collection
 * @param  [type]                                                                                       $variables [description]
 */
/**
 * Theme suggestion preprocess for islandora:sp_basic_image_collection
 */
function UTKdrupal_preprocess_islandora_basic_collection_wrapper__islandora_sp_basic_image_collection(&$variables) {
  $variables['template_preprocess_function_variable'] = "TESTING THE TEMPLATE PREPROCESS FUNCTION, UNIQUE TO BASIC IMAGE";
}

/**
 * Preprocess block based on delta.
 * @method UTKdrupal_preprocess_block
 * @param  [type]                     $variables [description]
 */

/**
 * Implements hook_preprocess_block().
 */
function UTKdrupal_preprocess_block(&$variables) {
  if ($variables['block']->{"delta"} == "simple") {
    $variables['classes_array'][] = 'fun-class';
    $variables['title_attributes_array']['class'] = array(
      'fun-title-attributes',
      'class-two-here',
    );
  }
}


/**
 * Render a block unique to this themes layouts.
 *
 * @param string $module
 *   The module providing the block.
 * @param string $delta
 *   The delta of the block
 *
 * @return string
 *   The rendered block's HTML content.
 */
function UTKdrupal_block_render($module, $delta, $as_renderable = FALSE) {
  $block = block_load($module, $delta);
  $block_content = _block_render_blocks(array($block));
  $build = _block_get_renderable_array($block_content);
  if ($as_renderable) {
    return $build;
  }
  $block_rendered = drupal_render($build);
  return $block_rendered;
}


/**
 * Hide fields from the user profile
 * @method UTKdrupal_preprocess_user_profile
 * @param  [type]                            $variables [description]
 */

 /**
  * Implements template_preprocess_page().
 */
function UTKdrupal_preprocess_user_profile(&$variables) {
  unset($variables['user_profile']['summary']['member_for']['#title']);
  unset($variables['user_profile']['summary']['member_for']['#markup']);
  unset($variables['user_profile']['summary']['member_for']['#type']);
  unset($variables['user_profile']['summary']['member_for']);
  $variables['user_profile']['summary']['#title']='';
}

/**
 * Implements hook_menu_local_tasks_alter().
 */
function UTKdrupal_menu_local_tasks_alter(&$data, $router_item, $root_path) {
  if (user_is_logged_in()) {
    // dpm(get_defined_vars());
    if ($root_path == 'user/%') {
      // Change the first tab title from 'View' to 'Profile'.
      if(isset($data['tabs'][0]) && is_array($data['tabs'][0])){
        foreach ($data['tabs'][0]['output'] as $key => $value) {
          if ($value['#link']['title'] == t('View')){
            $data['tabs'][0]['output'][$key]['#link']['title'] = t('Profile');
          }
          if ($value['#link']['title'] == t('Edit')){
            $data['tabs'][0]['output'][$key]['#link']['title'] = t('Edit Profile');
          }
        }
      }
    }
    // Modify Manage Files Tab and child tabs.
    $possibleUrls = array('islandora/object/%/manage/datastreams', 'islandora/object/%', 'islandora/object/%/manage');
    if (in_array($root_path, $possibleUrls, true)) {
      if(isset($data['tabs'][0]) && is_array($data['tabs'][0])){
        foreach ($data['tabs'][0]['output'] as $key => $value) {
          if ($value['#link']['title'] == t('Document')){
            unset($data['tabs'][0]['output'][$key]);
          }
          if ($value['#link']['title'] == t('Manage')){
            $data['tabs'][0]['output'][$key]['#link']['title'] = t('Manage Files');
            $data['tabs'][0]['output'][$key]['#link']['href'] = $router_item['href'] . '/manage/datastreams';
          }
          // Renames Add additional files tab.
          if (($root_path == 'islandora/object/%/manage/datastreams') && $data['actions']['output'][0]['#link']['title'] == t('Add a Supplemental File')){
            $data['actions']['output'][0]['#link']['title'] = t('Add Additional files');
          }
          // Changes 'View' tab to 'View Public Version'
          if ($value['#link']['title'] == t('View')){
            $data['tabs'][0]['output'][$key]['#link']['title'] = t('View Public Version');
            // Placeholder for updated digital commons/bpress URI
            //$data['tabs'][0]['output'][$key]['#link']['href'] = $router_item['href'] . 'NEW_PUBLIC_URI';
          }
        }
      }
      // Removes the Overview Tab.
      if(isset($data['tabs'][1]) && is_array($data['tabs'][1])){
        foreach ($data['tabs'][1]['output'] as $key => $value) {
          if ($value['#link']['title'] == t('Overview')){
            unset($data['tabs'][1]['output'][$key]);
          }
        }
      }
    }
    global $user;
    if (in_array('authUser-role', $user->roles)) {
      if ($root_path == 'messages/new') {
        drupal_goto('/');
      }
    }
  }

  // Check if the user has the 'admin' role.
  global $user;
  if (in_array('administrator', $user->roles)) {
    //dpm(get_defined_vars());
  }
  if (in_array('authenticated user', $user->roles)) {
  //  dpm(get_defined_vars());
  }
}
