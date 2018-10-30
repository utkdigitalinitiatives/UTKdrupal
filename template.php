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

function UTKdrupal_preprocess_html(&$vars) {
  drupal_add_css(path_to_theme() . '/ie.css', array('weight' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
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
