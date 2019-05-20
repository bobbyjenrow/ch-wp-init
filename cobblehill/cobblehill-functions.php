<?php
/*
* Cobble Hill Functions Compendium
*
*/

// Import Cleanup
// include_once 'cobblehill-cleanup.php';

// Import Custom Post Types
include 'cobblehill-walkers.php';


// Custom Functions
function handleize($string){
  return  strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
}
function formatPhone($unformatted){
  $area = substr($unformatted, 0, 3);
  $first3 = substr($unformatted, 3, 3);
  $last4 = substr($unformatted, 6, 4);
  return "($area) $first3-$last4";
}
function get_component($part,$args){
  $data = $args;
  include(locate_template("$part.php"));
}



// Enqueue Scripts
function queue_CH_scripts(){
  $relative_uri = '/assets/index';
  $js_uri = get_template_directory_uri() . $relative_uri . '.js';
  $css_uri = get_template_directory_uri()  . $relative_uri . '.css';
  wp_enqueue_script('cobblehill-js', $js_uri , array('jquery'), '', false );
  wp_enqueue_style( 'cobblehill-style', $css_uri  , array(), '', 'all');
}
add_action('wp_enqueue_scripts', 'queue_CH_scripts');

// Enable Options Page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

}

// Child Templates
function child_templates($template) {
    global $post;

    if ($post->post_parent) {
        // get top level parent page
        $_var=array_reverse(get_post_ancestors($post->ID));
        $parent = get_post(
            reset($_var)
        );

        // find the child template based on parent's slug or ID
        $child_template = locate_template(
            [
                'child-' . $parent->post_name . '.php',
                'child-' . $parent->ID . '.php',
                'child.php',
            ]
        );

        if ($child_template) return $child_template;
    }

    return $template;
}
add_filter( 'page_template', 'child_templates' );



 ?>
