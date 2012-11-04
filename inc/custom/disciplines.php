<?php /**
 * Create Discipline & Role Taxonomies
 */
register_taxonomy('disciplines',array (
  0 => 'creations',
),array( 'hierarchical' => true, 'label' => 'Disciplines','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => ''),'singular_label' => 'Discipline') );
register_taxonomy('roles',array (
  0 => 'creations',
),array( 'hierarchical' => false, 'label' => 'Roles','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => ''),'singular_label' => 'Role') );

/**
 * Register field groups specific to Disciplines
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '509583430ccc8',
		'title' => 'Discipline Fields',
		'fields' => 
		array (
			0 => 
			array (
				'label' => 'Discipline Icon',
				'name' => 'discipline_icon',
				'type' => 'image',
				'instructions' => '90 x 90 px icon to represent this Discipline (will be scaled to 10 x 10 for menus)',
				'required' => '0',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'key' => 'field_50958337cc24e',
				'order_no' => '0',
			),
			1 => 
			array (
				'label' => 'Long Name',
				'name' => 'discipline_long_name',
				'type' => 'text',
				'instructions' => 'eg. Film & Video',
				'required' => '1',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50958337cc81a',
				'order_no' => '2',
			),
			2 => 
			array (
				'label' => 'Long Description',
				'name' => 'discipline_long_description',
				'type' => 'textarea',
				'instructions' => 'Not too much, maybe two sentences.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_50958337cccdc',
				'order_no' => '4',
			),
			3 => 
			array (
				'label' => 'Recent Items Name',
				'name' => 'discipline_recent_items_name',
				'type' => 'text',
				'instructions' => 'eg. “Clips” would display “Recent Clips”',
				'required' => '0',
				'default_value' => 'Items',
				'formatting' => 'none',
				'key' => 'field_50958337cd2c1',
				'order_no' => '5',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'disciplines',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
}

/**
 * Add Custom Columns in the Admin sections
 */
function copious_disciplines_columns($columns)
{
	$columns = array(
		'cb'	 	=> '<input type="checkbox" />',
		'icon'	=>	'Icon',
		'name' 	=> 'Short Name',
		'long_name' => 'Long Name',
		'description' => 'Short Description',
		'slug' => 'Slug',
		'posts' => 'Creations',
		'id_number' => 'ID',
	);
	return $columns;
}

function copious_disciplines_column( $columns, $column, $id) {

	global $post;

	$post_id = 'disciplines_' . $id;

	if ( $column == 'icon' ) {

		$thumbnail 	= get_field( 'discipline_icon', $post_id );

		$columns .= '<img src="' . $thumbnail . '" alt="Thumbnail" class="wp-post-image" height="48" width="48" />';

	}
	elseif ( $column == 'long_name' ) {

		$columns .= the_field( 'discipline_long_name', $post_id );

	}

	elseif ( $column == 'id_number' ) {

		$columns .= $id;

	}

	return $columns;
}

function copious_column_register_sortable( $columns )
{
	$columns['long_name'] = 'long_name';
	$columns['id_number'] = 'id_number';
	return $columns;
}

add_filter( 'manage_disciplines_custom_column', 'copious_disciplines_column', 10, 3 );
add_filter("manage_edit-disciplines_columns", "copious_disciplines_columns");
add_filter("manage_edit-disciplines_sortable_columns", "copious_column_register_sortable" );