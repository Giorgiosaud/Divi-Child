<?php
if(!function_exists('dd')){
	function dd($var){
		die(var_dump($var));
	}
}
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_lang_function() {
load_child_theme_textdomain( 'et_builder', get_stylesheet_directory() . '/languages/et_builder' );
load_child_theme_textdomain( 'windowgard', get_stylesheet_directory() . '/languages/windowgard' );
}
add_action( 'after_setup_theme', 'my_lang_function' );

/* Enable Divi Builder on all post types with an editor box */
function myprefix_add_post_types($post_types) {
	foreach(get_post_types() as $pt) {
		if (!in_array($pt, $post_types) and post_type_supports($pt, 'editor')) {
			$post_types[] = $pt;
		}
	} 
	return $post_types;
}
add_filter('et_builder_post_types', 'myprefix_add_post_types');

/* Add Divi Custom Post Settings box */
function myprefix_add_meta_boxes() {
	foreach(get_post_types() as $pt) {
		if (post_type_supports($pt, 'editor') and function_exists('et_single_settings_meta_box')) {
			add_meta_box('et_settings_meta_box', __('Divi Custom Post Settings', 'Divi'), 'et_single_settings_meta_box', $pt, 'side', 'high');
		}
	} 
}
add_action('add_meta_boxes', 'myprefix_add_meta_boxes');

/* Ensure Divi Builder appears in correct location */
function myprefix_admin_js() { 
	$s = get_current_screen();
	if(!empty($s->post_type) and $s->post_type!='page' and $s->post_type!='post') { 
?>
<script>
jQuery(function($){
	$('#et_pb_layout').insertAfter($('#et_pb_main_editor_wrap'));
});
</script>
<style>
#et_pb_layout { margin-top:20px; margin-bottom:0px }
</style>
<?php
	}
}
add_action('admin_head', 'myprefix_admin_js');