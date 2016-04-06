<?php

    /*
	Plugin Name: Husky 100
	Plugin URI: http://www.washington.edu
	Description: Makes a people content type and directory template for the Husky 100
	Version: 0.1
	Author: UW Web Team
	*/

if (!defined('HUSKY_DIRECTORY')){
	define('HUSKY_DIRECTORY', '1.0');
}

register_activation_hook( __FILE__, 'create_husky_directory_page');
register_deactivation_hook( __FILE__, 'delete_husky_directory_page');

function create_husky_directory_page() {
	$husky_directory_post = array( 
		'post_title' => 'Husky 100',
		'post_name' => 'husky_100',
		'post_type' => 'page'
	);
	wp_insert_post($husky_directory_post);
}

function delete_husky_directory_page() {
	$query = new WP_Query(array('name'=>'husky_100','post_type'=>'page'));
	$query->the_post();
	$page_ID = get_the_ID();
	if ($page_ID) {
		wp_delete_post($page_ID);
	}
}

if ( ! post_type_exists( 'husky100' ) ):

	add_action('init', 'husky_post_type');
	add_action('template_include', 'add_husky_directory_template');

	function husky_post_type() {
		$labels = array(
			'name' => 'Husky 100',
			'singular_name' => 'Person',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Person',
			'edit_item' => 'Edit Person',
			'new_item' => 'New Person',
			'all_items' => 'All People',
			'view_item' => 'View Person',
			'search_item' => 'Search Husky 100',
			'not_found' => 'No people found',
			'not_found_in_trash' => 'No people found in trash',
			'parent_item_colon' => '',
			'menu_name' => 'Husky 100'
		);

		$args = array(
			'labels' => $labels,
			'public' => false,
			'publicly_queryable' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'rewrite' => array('slug' => 'husky100', 'with_front' => false),
			'supports' => array( 'title' , 'editor' , 'thumbnail' )
		);

		register_post_type('husky100', $args);
	}

    add_action('admin_menu', 'husky_settings_page');
    //add_action('admin_init', 'husky_post_options');

    function husky_settings_page() {
        add_settings_section('husky100', 'The following settings affect the Husky 100 Directory plugin only', 'husky_settings_callback', 'husky_settings');
        add_options_page('Husky 100 Settings', 'Husky 100', 'manage_options', 'husky_settings', 'husky_settings_page_callback');
    }

    function husky_settings_callback() {
        //nothing doing
        return;
    }

    function husky_settings_page_callback() {
        ?>
        <div class='wrap'>
            <h2>Husky 100 Settings</h2>
            <form method='post' action='options.php'>
                <?php 
                settings_fields('husky100');
                do_settings_sections('husky_settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

	add_action('admin_init', 'husky_admin_init');

	function husky_admin_init(){
		add_meta_box( 'hometown', 'Hometown', 'hometown_callback', 'husky100', 'side', 'low' );
		add_meta_box( 'major', 'Major', 'major_callback', 'husky100', 'side', 'low' );
		add_meta_box( 'minor', 'Minor', 'minor_callback', 'husky100', 'side', 'low' );
		add_meta_box( 'graduation', 'Anticipated graduation date', 'graduation_callback', 'husky100', 'side', 'low' );
		add_meta_box( 'linkedin', 'LinkedIn link', 'linkedin_callback', 'husky100', 'side', 'low' );
		
		remove_meta_box( 'filtersdiv', 'husky100', 'side' );
		remove_meta_box( 'tagsdiv', 'husky100', 'side' );
		add_meta_box( 'filtersdiv', 'Filters', 'post_categories_meta_box', 'husky100', 'normal', 'low', array( 'taxonomy' => 'filters' ) );
		add_meta_box( 'tagsdiv', 'Tags', 'post_categories_meta_box', 'husky100', 'normal', 'low', array( 'taxonomy' => 'tags' ) );
	}

	function hometown_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$hometown = $custom['hometown'][0];
		?><input name="hometown" value="<?php echo $hometown ?>" /><?php
	}

	function major_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$major = $custom['major'][0];
		?><input name="major" value="<?php echo $major ?>" /><?php
	}

	function minor_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$minor = $custom['minor'][0];
		?><input name="minor" value="<?php echo $minor ?>" /><?php
	}

	function graduation_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$graduation = $custom['graduation'][0];
		?><input name="graduation" value="<?php echo $graduation ?>" /><?php
	}

	function linkedin_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$linkedin = $custom['linkedin'][0];
		?><input name="linkedin" value="<?php echo $linkedin ?>" /><?php
	}

	add_action('save_post', 'save_person_details');

	function save_person_details() {
		global $post;
		if (get_post_type($post) == 'husky100') {
			update_post_meta($post->ID, 'hometown', $_POST['hometown']);
			update_post_meta($post->ID, 'major', $_POST['major']);
			update_post_meta($post->ID, 'minor', $_POST['minor']);
			update_post_meta($post->ID, 'graduation', $_POST['graduation']);
			update_post_meta($post->ID, 'linkedin', $_POST['linkedin']);
		}
	}

	function add_husky_directory_template($template) {
		$this_dir = dirname(__FILE__);
        //$custom_page = get_option('husky_directory_page_setting');
        $husky_directory_template = 'husky-directory-template.php';
        $is_directory = is_page('husky_100');
		if ($is_directory) {
			if (file_exists(get_stylesheet_directory() . '/' . $husky_directory_template)) {
				return get_stylesheet_directory() . '/' . $husky_directory_template;
			}
			else if (file_exists(get_template_directory() . '/' . $husky_directory_template)) {
				return get_template_directory() . '/' . $husky_directory_template;
			}
			return $this_dir . '/' . $husky_directory_template;
		}
		return $template;
	}


endif;

if (!taxonomy_exists('filters')):

	add_action('init', 'filters_taxonomy');

	function filters_taxonomy() {
		register_taxonomy('filters', 'husky100', array(
			'labels' => array(
				'name' => 'Filters',
				'singular_name' => 'filter',
				'all_items' => 'All filters',
				'edit_item' => 'Edit filter',
				'view_item' => 'View filter',
				'add_new_item' => 'Add new filter',
				'new_item_name' => 'New filter name',
				'search_items' => 'Search filters',
				'popular_items' => 'Popular filters',
				'parent_item' => 'Parent filter',
				'add_or_remove_items' => 'Add or remove filters',
				'choose_from_most_used' => 'Choose from the most used filters',
				'not_found' => 'No filters found.'
			),
			'hierarchical' => true
		));
		register_taxonomy_for_object_type('filters', 'husky100');
	}

endif;

if (!taxonomy_exists('tags')):

	add_action('init', 'tags_taxonomy');

	function tags_taxonomy() {
		register_taxonomy('tags', 'husky100', array(
			'labels' => array(
				'name' => 'Tags',
				'singular_name' => 'tag',
				'all_items' => 'All tags',
				'edit_item' => 'Edit tag',
				'view_item' => 'View tag',
				'add_new_item' => 'Add new tag',
				'new_item_name' => 'New tag name',
				'search_items' => 'Search tags',
				'popular_items' => 'Popular tags',
				'parent_item' => 'Parent tag',
				'add_or_remove_items' => 'Add or remove tags',
				'choose_from_most_used' => 'Choose from the most used tags',
				'not_found' => 'No tags found.'
			),
			'hierarchical' => true
		));
		register_taxonomy_for_object_type('tags', 'husky100');
	}

endif;

add_action('init', 'load_other_resources');

function load_other_resources() {
	wp_enqueue_script('jquery');
	wp_register_script('tiles-js', plugins_url('js/tiles.js', __FILE__), 'jquery');
	wp_enqueue_script('tiles-js');
	wp_register_style('tiles-style', plugins_url('css/tiles.css', __FILE__));
	wp_enqueue_style('tiles-style');
}



?>
