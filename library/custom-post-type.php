<?php
/* joints Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// let's create the function for the custom type
function clg_people() {
	// creating (registering) the custom type
	register_post_type( 'people', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('People', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Person', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All People', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New Person', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Person', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Person', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Person', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Person', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search People', 'jointstheme'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Wherl People', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-id-alt', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'people', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail', 'author')
	 	) /* end of options */
	); /* end of register post type */
}
	// adding the function to the Wordpress init
	add_action( 'init', 'clg_people');


if(function_exists("register_field_group"))
{


	register_field_group(array (
		'id' => 'acf_contact-details',
		'title' => 'Contact Details',
		'fields' => array (
			array (
				'key' => 'field_5375d9dac440f',
				'label' => 'Phone',
				'name' => 'phone_landline',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5375da22c4411',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => 'yourname@example.com',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_5379db07047fd',
				'label' => 'Twitter',
				'name' => 'twitter',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => 'Enter the full URL for your Twitter profile eg https://twitter.com/YOURPROFILENAME',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5379db63047fe',
				'label' => 'LinkedIn',
				'name' => 'linkedin',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => 'Enter the full URL for your LinkedIn profile',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
				array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 2,
					'group_no' => 2,
				),
			),
            array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'people',
					'order_no' => 0,
					'group_no' => 1,
				),
			)
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_location',
		'title' => 'Location',
		'fields' => array (
            array (
				'key' => 'field_544799529417c',
				'label' => 'Address',
				'name' => 'contact_address',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => 'Enter your organisation address; You can also add a map by using the location function below',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_544775c4bdf17',
				'label' => 'Map',
				'name' => 'contact_map',
				'type' => 'google_map',
				'center_lat' => '51.5072',
				'center_lng' => '0.1275',
				'zoom' => '',
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_slider',
		'title' => 'Slider',
		'fields' => array (
			array (
				'key' => 'field_544bbed059b54',
				'label' => 'Logo Image',
				'name' => 'logo_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_544bbef859b55',
				'label' => 'Slide One',
				'name' => 'slide_one',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_544bbf2559b56',
				'label' => 'Slide Two',
				'name' => 'slide_two',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'revisions',
			),
		),
		'menu_order' => 0,
	));


}

?>
