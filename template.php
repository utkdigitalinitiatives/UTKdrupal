<?php
/**
 * @file
 * Template.php - functions to manipulate Drupal's default markup.
 *
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
	// dsm($form_id);
	// if($form_id == "search_block_form"){
  //   dsm($form);
  // }
}
