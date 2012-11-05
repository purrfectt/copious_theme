<?php /**
 * Create Creation Post Type
 */
register_post_type('creations', array(	'label' => 'Creations','description' => 'Things made throughout the years.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'menu_position' => 5,'supports' => array('title','editor','trackbacks','custom-fields','comments','revisions','thumbnail','author','post-formats',),'taxonomies' => array('post_tag','disciplines',),'labels' => array (
  'name' => 'Creations',
  'singular_name' => 'Creation',
  'menu_name' => 'Creations',
  'add_new' => 'Add Creation',
  'add_new_item' => 'Add New Creation',
  'edit' => 'Edit',
  'edit_item' => 'Edit Creation',
  'new_item' => 'New Creation',
  'view' => 'View Creation',
  'view_item' => 'View Creation',
  'search_items' => 'Search Creations',
  'not_found' => 'No Creations Found',
  'not_found_in_trash' => 'No Creations Found in Trash',
  'parent' => 'Parent Creation',
),) );

// Define icon styles for the custom post type
function copious_creations_icons() {
	?>
<style type="text/css" media="screen">
        #menu-posts-creations .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/creations-icon.png) no-repeat 6px -32px !important;
        }
        #menu-posts-creations:hover .wp-menu-image, #menu-posts-creations.wp-has-current-submenu .wp-menu-image {
            background-position:6px 0px !important;
        }
        #icon-edit.icon32-posts-creations {background: url(<?php bloginfo('template_url') ?>/images/creations-icon-32x32.png) no-repeat;}
    </style>

<?php }
add_action( 'admin_head', 'copious_creations_icons' );

/**
 * Register field groups for Posts, Creations, Categories (our custom color bands), and Post Formats.
 */

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => '5095a0ebb97ca',
    'title' => 'Post Category Fields',
    'fields' => 
    array (
      0 => 
      array (
        'label' => 'Custom Color',
        'name' => 'custom_color',
        'type' => 'color_picker',
        'instructions' => 'This is the Custom Color for the Blog bands under the primary content.',
        'required' => '0',
        'default_value' => '#eee',
        'key' => 'field_5095a0e2b4e3c',
        'order_no' => '0',
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
          'value' => 'category',
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
 register_field_group(array (
    'id' => '5096a30d7c485',
    'title' => 'Audio Creation Fields',
    'fields' => 
    array (
      0 => 
      array (
        'key' => 'field_5096a0f2b6faa',
        'label' => 'Audio File',
        'name' => 'creation_audio_file',
        'type' => 'file',
        'instructions' => '',
        'required' => '0',
        'save_format' => 'object',
        'order_no' => '0',
      ),
    ),
    'location' => 
    array (
      'rules' => 
      array (
        0 => 
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'creations',
          'order_no' => '0',
        ),
        1 => 
        array (
          'param' => 'post_format',
          'operator' => '==',
          'value' => 'audio',
          'order_no' => '1',
        ),
      ),
      'allorany' => 'all',
    ),
    'options' => 
    array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => 
      array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => '5096a30d7cbb2',
    'title' => 'Gallery Fields',
    'fields' => 
    array (
      0 => 
      array (
        'choices' => 
        array (
          'type1' => 'type1',
          'type2' => 'type2',
          'type3' => 'type3',
        ),
        'key' => 'field_5096a19d03a2a',
        'label' => 'Gallery Type',
        'name' => 'creation_gallery_type',
        'type' => 'select',
        'instructions' => '',
        'required' => '0',
        'default_value' => 'type1',
        'allow_null' => '0',
        'multiple' => '0',
        'order_no' => '0',
      ),
    ),
    'location' => 
    array (
      'rules' => 
      array (
        0 => 
        array (
          'param' => 'post_format',
          'operator' => '==',
          'value' => 'gallery',
          'order_no' => '0',
        ),
      ),
      'allorany' => 'all',
    ),
    'options' => 
    array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => 
      array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => '5096a30d7db57',
    'title' => 'Generic Post Fields',
    'fields' => 
    array (
      0 => 
      array (
        'label' => 'Notes',
        'name' => 'post_notes',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'yes',
        'the_content' => 'yes',
        'key' => 'field_5096a2f6d5801',
        'order_no' => '0',
      ),
    ),
    'location' => 
    array (
      'rules' => 
      array (
        0 => 
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
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
  register_field_group(array (
    'id' => '5096a30d7f07c',
    'title' => 'Image Fields',
    'fields' => 
    array (
    ),
    'location' => 
    array (
      'rules' => 
      array (
        0 => 
        array (
          'param' => 'post_format',
          'operator' => '==',
          'value' => 'image',
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
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => '5096a53b1ad8b',
    'title' => 'Video Fields',
    'fields' => 
    array (
      0 => 
      array (
        'label' => 'Video Embed Code',
        'name' => 'copious_video_content',
        'type' => 'textarea',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'html',
        'key' => 'field_5096a52d8dcfb',
        'order_no' => '0',
      ),
      1 => 
      array (
        'label' => 'Video External Link',
        'name' => 'copious_video_link',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_5096a52d8e1dd',
        'order_no' => '1',
      ),
    ),
    'location' => 
    array (
      'rules' => 
      array (
        0 => 
        array (
          'param' => 'post_format',
          'operator' => '==',
          'value' => 'video',
          'order_no' => '0',
        ),
      ),
      'allorany' => 'all',
    ),
    'options' => 
    array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => 
      array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => '5096a30d7fc55',
    'title' => 'Generic Creation Custom Fields',
    'fields' => 
    array (
      0 => 
      array (
        'label' => 'Work Type',
        'name' => 'creation_work_type',
        'type' => 'radio',
        'instructions' => '',
        'required' => '0',
        'choices' => 
        array (
          'Client' => 'Client',
          'Personal' => 'Personal',
        ),
        'default_value' => 'Client',
        'layout' => 'horizontal',
        'key' => 'field_50969f014e423',
        'order_no' => '0',
      ),
      1 => 
      array (
        'label' => 'Short Description',
        'name' => 'creation_short_description',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f014f391',
        'order_no' => '1',
      ),
      2 => 
      array (
        'label' => 'Date of Completion',
        'name' => 'creation_completion',
        'type' => 'date_picker',
        'instructions' => '',
        'required' => '0',
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'key' => 'field_50969f014f6c1',
        'order_no' => '2',
      ),
      3 => 
      array (
        'label' => 'Notes',
        'name' => 'creation_notes',
        'type' => 'wysiwyg',
        'instructions' => 'Notes on the Creation',
        'required' => '0',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'yes',
        'the_content' => 'yes',
        'key' => 'field_50969f014f914',
        'order_no' => '3',
      ),
      4 => 
      array (
        'label' => 'Client Name',
        'name' => 'creation_client_name',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f014fb8b',
        'order_no' => '4',
      ),
      5 => 
      array (
        'label' => 'Client Website',
        'name' => 'creation_client_website',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f014fedf',
        'order_no' => '5',
      ),
      6 => 
      array (
        'label' => 'Collaborator 1\'s Position',
        'name' => 'creation_collaborator1_position',
        'type' => 'text',
        'instructions' => 'eg. Editor',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f0150222',
        'order_no' => '6',
      ),
      7 => 
      array (
        'label' => 'Collaborator 1\'s Name',
        'name' => 'creation_collaborator1_name',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f01512ae',
        'order_no' => '7',
      ),
      8 => 
      array (
        'label' => 'Collaborator 1\'s Website',
        'name' => 'creation_collaborator1_website',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f0151810',
        'order_no' => '8',
      ),
      9 => 
      array (
        'label' => 'Collaborator 2\'s Position',
        'name' => 'creation_collaborator2_position',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f0151a7b',
        'order_no' => '9',
      ),
      10 => 
      array (
        'label' => 'Collaborator 2\'s Name',
        'name' => 'creation_collaborator2_name',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f0151cb5',
        'order_no' => '10',
      ),
      11 => 
      array (
        'label' => 'Collaborator 2\'s Website',
        'name' => 'creation_collaborator2_website',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f0151ee3',
        'order_no' => '11',
      ),
      12 => 
      array (
        'label' => 'Collaborator 3\'s Position',
        'name' => 'creation_collaborator3_position',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f015218f',
        'order_no' => '12',
      ),
      13 => 
      array (
        'label' => 'Collaborator 3\'s Name',
        'name' => 'creation_collaborator3_name',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f01523cf',
        'order_no' => '13',
      ),
      14 => 
      array (
        'label' => 'Collaborator 3\'s Website',
        'name' => 'creation_collaborator3_website',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f0152622',
        'order_no' => '14',
      ),
      15 => 
      array (
        'label' => 'Extra Label',
        'name' => 'creation_extra_label',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f015285b',
        'order_no' => '15',
      ),
      16 => 
      array (
        'label' => 'Extra Content',
        'name' => 'creation_extra_content',
        'type' => 'text',
        'instructions' => '',
        'required' => '0',
        'default_value' => '',
        'formatting' => 'none',
        'key' => 'field_50969f0152aa6',
        'order_no' => '16',
      ),
    ),
    'location' => 
    array (
      'rules' => 
      array (
        0 => 
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'creations',
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
    'menu_order' => 1,
  ));
}