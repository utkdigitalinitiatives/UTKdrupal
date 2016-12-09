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
*/

/**
 * Modify any theme hooks variables or add your own variables, using preprocess or process functions.
 * Override any theme function. That is, replace a module's default theme function with one you write.
 * Call hook_*_alter() functions which allow you to alter various parts of Drupal's internals, including
 * the render elements in forms. The most useful of which include hook_form_alter(),
 * hook_form_FORM_ID_alter(), and hook_page_alter(). See api.drupal.org for more information about
 * _alter functions. Or link to this file's description https://www.drupal.org/node/1728096
*/
function UTKdrupal_preprocess_page(&$variables) {
  global $base_path;
  $variables['logopath'] = $base_path.'/' . drupal_get_path('theme','UTKdrupal') . '/logo.png';
}

/**
* hook_form_FORM_ID_alter
*/
function UTKdrupal_form_search_block_form_alter(&$form, &$form_state, $form_id) {
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 20;  // define size of the textfield
    $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
    // $form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
    // $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search-button.png');

    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";
    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
}

/*
 * Implementation of hook_form_alter()
 */
function UTKdrupal_form_alter(&$form, &$form_state, $form_id) {
}


/**
 * Implements hook_preprocess().
 */
function UTKdrupal_preprocess_islandora_large_image(&$variables) {
  $variables['large_image_preprocess_function_variable'] = "TESTING LARGE IMAGE PREPROCESS FUNCTION IN THEME";
}
/**
 * Implements hook_form_alter().
 */
function UTKdrupal_form_islandora_solr_simple_search_form_alter(&$form, &$form_state, $form_id) {
  $form['simple']['islandora_simple_search_query']['#attributes']['placeholder'] = t("Search Repository");
}

/**
 * Theme suggestion preprocess for islandora:sp_basic_image_collection
 */
function UTKdrupal_preprocess_islandora_basic_collection_wrapper__islandora_sp_basic_image_collection(&$variables) {
  // From here, we can do something entirely different for this particular collection, based on PID
  // Editing or adding to the variables array here will make it available in the overridden template,
  // In this case, 'islandora-basic-collection-wrapper--islandora-sp-basic-image-collection.tpl.php'
  $variables['template_preprocess_function_variable'] = "TESTING THE TEMPLATE PREPROCESS FUNCTION, UNIQUE TO BASIC IMAGE";
}
/**
 * Implements hook_preprocess_block().
 */
function UTKdrupal_preprocess_block(&$variables) {
  // Preprocess block based on delta.
  if ($variables['block']->{"delta"} == "simple") {
    // Could do something fancy here i suppose.
    $variables['classes_array'][] = 'fun-class';
    $variables['title_attributes_array']['class'] = array(
      'fun-title-attributes',
      'class-two-here',
    );
    // Add additional attributes as required.
  }
}
function UTKdrupal_preprocess_region(&$variables) {
  // Region preprocessing, switch on region name in var's, $variables['region']  <-name
}
function UTKdrupal_js_alter(&$javascript) {
}
function UTKdrupal_css_alter(&$css) {
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

/** Setup but not enabled
 * function UTKdrupal_preprocess_page(&$variables) {
 *   $status = drupal_get_http_header("status");
 *   if($status == '404') {
 *     $variables['theme_hook_suggestions'][] = '404_page';
 *   }
 * }
*/

// $account = user_load($node->uid);
// $pm_link_text = t('Send a PM to Author');
// $pm_url = privatemsg_get_link($account) . '/' . t('RE: @title', array('@title' => $node->title));
// $pm_link = l($pm_link_text, $pm_url, array('query' => array(drupal_get_destination())));

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
	// dpm(get_defined_vars());
	if ($root_path == 'user/%') {
    // Change the first tab title from 'View' to 'Profile'.
    if ($data['tabs'][0]['output'][0]['#link']['title'] == t('View')) {
      $data['tabs'][0]['output'][0]['#link']['title'] = t('Profile');
    }
    if ($data['tabs'][0]['output'][1]['#link']['title'] == t('Edit')) {
      $data['tabs'][0]['output'][1]['#link']['title'] = t('Edit Profile');
    }
  }
	if ($root_path == 'islandora/object/%/manage' || $root_path == 'islandora/object/%') {
    if ($data['tabs'][0]['output'][1]['#link']['title'] == t('Manage')) {
      $data['tabs'][0]['output'][1]['#link']['title'] = t('Manage Files');
      $data['tabs'][0]['output'][1]['#link']['href'] = $router_item['href'] . '/manage/datastreams';
  	} else if ($data['tabs'][0]['output'][2]['#link']['title'] == t('Manage')) {
      $data['tabs'][0]['output'][2]['#link']['title'] = t('Manage Files');
      $data['tabs'][0]['output'][2]['#link']['href'] = $router_item['href'] . '/manage/datastreams';
			$data['tabs'][0]['output'][1]['#link']['title'] = t('');
    }
	}
}
