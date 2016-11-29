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








if ( ! function_exists('servicios_post_type') ) {

// Register Custom Post Type
function servicios_post_type() {

	$labels = array(
		'name'                  => _x( 'Servicios', 'Post Type General Name', 'windowgard' ),
		'singular_name'         => _x( 'Servicio', 'Post Type Singular Name', 'windowgard' ),
		'menu_name'             => __( 'Servicios', 'windowgard' ),
		'name_admin_bar'        => __( 'Servicios', 'windowgard' ),
		'archives'              => __( 'Item Archives', 'windowgard' ),
		'parent_item_colon'     => __( 'Parent Item:', 'windowgard' ),
		'all_items'             => __( 'All Items', 'windowgard' ),
		'add_new_item'          => __( 'Add New Item', 'windowgard' ),
		'add_new'               => __( 'Add New', 'windowgard' ),
		'new_item'              => __( 'New Item', 'windowgard' ),
		'edit_item'             => __( 'Edit Item', 'windowgard' ),
		'update_item'           => __( 'Update Item', 'windowgard' ),
		'view_item'             => __( 'View Item', 'windowgard' ),
		'search_items'          => __( 'Search Item', 'windowgard' ),
		'not_found'             => __( 'Not found', 'windowgard' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'windowgard' ),
		'featured_image'        => __( 'Featured Image', 'windowgard' ),
		'set_featured_image'    => __( 'Set featured image', 'windowgard' ),
		'remove_featured_image' => __( 'Remove featured image', 'windowgard' ),
		'use_featured_image'    => __( 'Use as featured image', 'windowgard' ),
		'insert_into_item'      => __( 'Insert into item', 'windowgard' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'windowgard' ),
		'items_list'            => __( 'Items list', 'windowgard' ),
		'items_list_navigation' => __( 'Items list navigation', 'windowgard' ),
		'filter_items_list'     => __( 'Filter items list', 'windowgard' ),
	);
	$args = array(
		'label'                 => __( 'Servicio', 'windowgard' ),
		'description'           => __( 'Servicios', 'windowgard' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'trackbacks', 'custom-fields', 'page-attributes', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'servicio', $args );

}
add_action( 'init', 'servicios_post_type', 0 );

}












if ( ! function_exists('productos_post_type') ) {

// Register Custom Post Type
function productos_post_type() {

	$labels = array(
		'name'                  => _x( 'Producto', 'Post Type General Name', 'windowgard' ),
		'singular_name'         => _x( 'Producto', 'Post Type Singular Name', 'windowgard' ),
		'menu_name'             => __( 'Productos', 'windowgard' ),
		'name_admin_bar'        => __( 'Productos', 'windowgard' ),
		'archives'              => __( 'Item Archives', 'windowgard' ),
		'parent_item_colon'     => __( 'Parent Item:', 'windowgard' ),
		'all_items'             => __( 'All Items', 'windowgard' ),
		'add_new_item'          => __( 'Add New Item', 'windowgard' ),
		'add_new'               => __( 'Add New', 'windowgard' ),
		'new_item'              => __( 'New Item', 'windowgard' ),
		'edit_item'             => __( 'Edit Item', 'windowgard' ),
		'update_item'           => __( 'Update Item', 'windowgard' ),
		'view_item'             => __( 'View Item', 'windowgard' ),
		'search_items'          => __( 'Search Item', 'windowgard' ),
		'not_found'             => __( 'Not found', 'windowgard' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'windowgard' ),
		'featured_image'        => __( 'Featured Image', 'windowgard' ),
		'set_featured_image'    => __( 'Set featured image', 'windowgard' ),
		'remove_featured_image' => __( 'Remove featured image', 'windowgard' ),
		'use_featured_image'    => __( 'Use as featured image', 'windowgard' ),
		'insert_into_item'      => __( 'Insert into item', 'windowgard' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'windowgard' ),
		'items_list'            => __( 'Items list', 'windowgard' ),
		'items_list_navigation' => __( 'Items list navigation', 'windowgard' ),
		'filter_items_list'     => __( 'Filter items list', 'windowgard' ),
	);
	$args = array(
		'label'                 => __( 'Producto', 'windowgard' ),
		'description'           => __( 'Productos', 'windowgard' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'trackbacks', 'custom-fields', 'page-attributes', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'producto', $args );

}
add_action( 'init', 'productos_post_type', 0 );

}

