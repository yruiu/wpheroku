<?php
function geniusuran_register_post_type(){
$args=array(
'hierarchical' =>false,
'labels'       =>array('name'              => _x( 'brands', 'taxonomy general name', 'geniusuran' ),
'singular_name'     => _x( 'brands', 'taxonomy singular name', 'geniusuran' ),
'search_items'      => __( 'Search brands', 'geniusuran' ),
'all_items'         => __( 'All brands', 'geniusuran' ),
'parent_item'       => __( 'Parent brands', 'geniusuran' ),
'parent_item_colon' => __( 'Parent brands:', 'geniusuran' ),
'edit_item'         => __( 'Edit brands', 'geniusuran' ),
'update_item'       => __( 'Update brands', 'geniusuran' ),
'add_new_item'      => __( 'Add New brands', 'geniusuran' ),
'new_item_name'     => __( 'New Genre brands', 'geniusuran' ),
'menu_name'         => __( 'brands', 'geniusuran' ),
),
'show_ui'=> true,
'rewrite'=>array('slag'=>'brands'),
'query_var'=>true,
'show_admin_column'=>true,
'show_in_rest'=>true,

);
register_taxonomy('brand', array('car'),$args);
unset($args);
$args=array(
'hierarchical' =>true,
'labels'       =>array('name'              => _x( 'manufacture', 'taxonomy general name', 'geniusuran' ),
'singular_name'     => _x( 'manufacture', 'taxonomy singular name', 'geniusuran' ),
'search_items'      => __( 'Search manufacture', 'geniusuran' ),
'all_items'         => __( 'All manufacture', 'geniusuran' ),
'parent_item'       => __( 'Parent manufacture', 'geniusuran' ),
'parent_item_colon' => __( 'Parent manufacture:', 'geniusuran' ),
'edit_item'         => __( 'Edit manufacture', 'geniusuran' ),
'update_item'       => __( 'Update manufacture', 'geniusuran' ),
'add_new_item'      => __( 'Add New manufacture', 'geniusuran' ),
'new_item_name'     => __( 'New Genre manufacture', 'geniusuran' ),
'menu_name'         => __( 'manufacture', 'geniusuran' ),
),
'show_ui'=> true,
'rewrite'=>array('slag'=>'manufacture'),
'query_var'=>true,
'show_in_rest'=>true,
'show_admin_column'=>true,

);
register_taxonomy('manufacture', array('car'),$args);


unset($args);
$args                 =array(

'label'           => esc_html__('Cars', 'geniusuran'),
'labels'          =>array(

'name'                  =>esc_html_x( 'Cars', 'Post type general name', 'geniusuran' ),
'singular_name'         =>esc_html_x( 'Cars', 'Post type singular name', 'geniusuran' ),
'menu_name'             =>esc_html_x( 'Cars', 'Admin Menu text', 'geniusuran' ),
'name_admin_bar'        =>esc_html_x( 'Cars', 'Add New on Toolbar', 'geniusuran' ),
'add_new'               =>esc_html__( 'Add New', 'geniusuran' ),
'add_new_item'          =>esc_html__( 'Add New Cars', 'geniusuran' ),
'new_item'              =>esc_html__( 'New Cars', 'geniusuran' ),
'edit_item'             =>esc_html__( 'Edit Cars', 'geniusuran' ),
'view_item'             =>esc_html__( 'View Cars', 'geniusuran' ),
'all_items'             =>esc_html__( 'All Cars', 'geniusuran' ),
'search_items'          =>esc_html__( 'Search Cars', 'geniusuran' ),
'parent_item_colon'     =>esc_html__( 'Parent Cars:', 'geniusuran' ),
'not_found'             =>esc_html__( 'No Cars found.', 'geniusuran' ),
'not_found_in_trash'    =>esc_html__( 'No Cars found in Trash.', 'geniusuran' ),
'featured_image'        =>esc_html_x( 'Cars Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'geniusuran' ),
'set_featured_image'    =>esc_html_x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'geniusuran' ),
'remove_featured_image' =>esc_html_x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'geniusuran' ),
'use_featured_image'    =>esc_html_x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'geniusuran' ),
'archives'              =>esc_html_x( 'Cars archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'geniusuran' ),
'insert_into_item'      =>esc_html_x( 'Insert into Cars', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'geniusuran' ),
'uploaded_to_this_item' =>esc_html_x( 'Uploaded to this Cars', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'geniusuran' ),
'filter_items_list'     =>esc_html_x( 'Filter Cars list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'geniusuran' ),
'items_list_navigation' =>esc_html_x( 'Cars list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'geniusuran' ),
'items_list'            =>esc_html_x( 'Cars list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'geniusuran' ),
),
'supports'        =>array('title', 'editor', 'author', 'thumbnail','page-attributes', 'post-format'),
'public'          =>true,
'public_queryable'=>true,
'show_ui'         =>true,
'show_in_menu'    =>true,
'has_archive'     =>true,
'show_in_nav_menus'=>false,
'menu_position'   =>100,
'menu_icon'       =>'dashicons-welcome-write-blog',
'rewrite'         =>array('slug'=>'cars')


);
register_post_type('car', $args);















}

add_action('init', 'geniusuran_register_post_type');