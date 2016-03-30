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
		'post_title' => 'Husky 100 Directory',
		'post_name' => 'husky100',
		'post_type' => 'page'
	);
	wp_insert_post($husky_directory_post);
}

function delete_husky_directory_page() {
	$query = new WP_Query(array('name'=>'husky100','post_type'=>'page'));
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
			'public' => get_option('husky_visible_setting'),
			'publicly_queryable' => get_option('husky_visible_setting'),
			'show_ui' => true,
			'show_in_menu' => true,
			'rewrite' => array('slug' => 'husky100', 'with_front' => false)
		);

		register_post_type('husky100', $args);
	}

    add_action('admin_menu', 'husky_settings_page');
    add_action('admin_init', 'husky_post_options');

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

	function husky_post_options() {
		//register_setting('husky100', 'husky_visible_setting');

		//add_settings_field('husky_visible_setting', 'Make Single Student Pages?', 'husky_visible_setting_callback', 'husky_settings', 'husky100');

		// register_setting('husky100', 'husky_directory_page_setting');

		// add_settings_field('husky_directory_page_setting', 'Enter the slug of your Husky 100 directory:', 'husky_directory_page_setting_callback', 'husky_settings', 'husky100');

		register_setting('husky100', 'husky_priority_husky');

		add_settings_field('husky_priority_husky', 'Choose up to 5 students to float to the top of lists:', 'husky_priority_husky_callback', 'husky_settings', 'husky100');

		register_setting('husky100', 'husky_priority_team');

		add_settings_field('husky_priority_team', 'Choose a team to display first in directory:', 'husky_priority_team_callback', 'husky_settings', 'husky100');
	}

    function husky_visible_setting_callback() {
        echo "<input name='husky_visible_setting' type='checkbox' value='1'" . checked( 1, get_option('husky_visible_setting'), false) . "/> (yes if checked)";
    }

    function husky_directory_page_setting_callback() {
        $slug = get_option('husky_directory_page_setting');
        ?>
        <input name='husky_directory_page_setting' type='text' value='<?php echo $slug ?>'/> (default slug: husky_directory)
        <?php
    }

    function husky_priority_husky_callback() {
        $husky = get_posts(array('posts_per_page' => -1, 'post_type' => 'husky100'));
        $option = get_option('husky_priority_husky');
        for ($i = 1; $i <= 5; $i++){
                ?>
                <p><?php echo $i ?>) 
                    <select name='husky_priority_husky[<?php echo $i ?>]' value='<?php echo $option[$i] ?>'/>
                    <option value='false'>----</option>
                    <?php
                    foreach ($husky as $person) {
                        $selected = false;
                        $personName = $person->post_title;
                        if ($option[$i] == $personName){
                            $selected = true;
                        }
                        ?>
                        <option value='<?php echo $personName ?>'<?php if ($selected) { ?> selected<?php } ?>><?php echo $personName ?></option>
                        <?php
                    }
                    ?>
                    </select>
                </p>
            <?php
        }
    }

    function husky_priority_team_callback() {
        $teams = get_terms('teams');
        $option = get_option('husky_priority_team');
        ?>
        <select name='husky_priority_team'/>
        <option value='false'>----</option>
        <?php
        foreach ($teams as $team) {
            $selected = false;
            $catName = $team->name;
            if ($option == $catName){
                $selected = true;
            }
            ?>
            <option value='<?php echo $catName ?>'<?php if ($selected) { ?> selected<?php } ?>><?php echo $catName ?></option>
            <?php
        }
        ?>
        </select>
        <?php
    }

	add_action('admin_init', 'husky_admin_init');

	function husky_admin_init(){
		add_meta_box('hometown', 'Hometown', 'hometown_callback', 'husky100', 'side', 'low');
		add_meta_box('major', 'Major', 'major_callback', 'husky100', 'side', 'low');
		add_meta_box('minor', 'Minor', 'minor_callback', 'husky100', 'side', 'low');
		add_meta_box('graduation', 'Anticipated graduation date', 'graduation_callback', 'husky100', 'side', 'low');
		add_meta_box('main_pic', 'Main Picture', 'main_pic_callback', 'husky100', 'normal', 'low');
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

	function main_pic_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$pic_url = $custom['main_pic'][0];
		?><p>Use the Add Media button above to the image upload or select from uploaded images. The field below accepts an image url, so enter the generated url here (or if you want to use an image not hosted here, just enter the url for that image).</p><?php
		?><input style='width:99%' name="main_pic" value="<?php echo $pic_url ?>" /><?php
		if (!empty($pic_url)) {
			?><img src="<?php echo $pic_url ?>" height=300 width=225 style='display:block;margin:auto'/><?php
		}
		else {
			?><p>no image currently selected</p><?php
		}
	}

	add_action('save_post', 'save_person_details');

	function save_person_details() {
		global $post;
		if (get_post_type($post) == 'husky100') {
			update_post_meta($post->ID, 'team', $_POST['team']);
			update_post_meta($post->ID, 'hometown', $_POST['hometown']);
			update_post_meta($post->ID, 'major', $_POST['major']);
			update_post_meta($post->ID, 'minor', $_POST['minor']);
			update_post_meta($post->ID, 'graduation', $_POST['graduation']);
			update_post_meta($post->ID, 'main_pic', $_POST['main_pic']);
		}
	}

	function add_husky_directory_template($template) {
		$this_dir = dirname(__FILE__);
        $custom_page = get_option('husky_directory_page_setting');
        $husky_directory_template = 'husky-directory-template.php';
		if (file_exists(get_stylesheet_directory() . '/' . $husky_directory_template)) {
			return get_stylesheet_directory() . '/' . $husky_directory_template;
		}
		else if (file_exists(get_template_directory() . '/' . $husky_directory_template)) {
			return get_template_directory() . '/' . $husky_directory_template;
		}
		return $this_dir . '/' . $husky_directory_template;
	}


endif;

if (!taxonomy_exists('teams')):

	add_action('init', 'teams_taxonomy');

	function teams_taxonomy() {
		register_taxonomy('teams', 'husky100', array(
			'labels' => array(
				'name' => 'Teams/Departments',
				'singular_name' => 'team',
				'all_items' => 'All teams',
				'edit_item' => 'Edit team',
				'view_item' => 'View team',
				'add_new_item' => 'Add new team',
				'new_item_name' => 'New team name',
				'search_items' => 'Search teams',
				'popular_items' => 'Popular teams',
				'parent_item' => 'Parent team',
				'add_or_remove_items' => 'Add or remove teams',
				'choose_from_most_used' => 'Choose from the most used teams',
				'not_found' => 'No teams found.'
			),
			'hierarchical' => true
		));
		register_taxonomy_for_object_type('teams', 'husky100');
	}

endif;

add_action('init', 'load_other_resources');

function load_other_resources() {
	wp_enqueue_script('jquery');
	wp_register_script('live-search', plugins_url('js/live-search.js', __FILE__), 'jquery');
	wp_enqueue_script('live-search');
	wp_register_style('directory-style', plugins_url('css/husky-directory.css', __FILE__));
	wp_enqueue_style('directory-style');
	add_shortcode( 'directory', 'shortcode' );
}

// [directory team="null"]
function shortcode( $atts )
  {
	include 'template_functions.php';

	 $atts = (object) shortcode_atts( array(
	    'team' => null,
	 ), $atts);

	 $args = array('post_type' => 'husky100', 'posts_per_page' => -1);
	    $query = new WP_Query($args);
	    $husky = $query->get_posts();

	    $array = array();
	    foreach($husky as $person){
	    	$name = $person->post_title;
	    	$name = explode(" ", $name);
	    	if (substr($name[1], 1, 1) == "."){
	    		$last = $name[2];
	    	} else {
	    		$last = $name[1];
	    	}
	    	$array[$last] =  $person;
	    }
	    ksort($array);
	    $return = '';
	    foreach($array as $person){
	    	$personteam = get_the_terms($person->ID, 'teams'); 
	    	$teams = array();
	    	foreach($personteam as $team){
	    		$teams[] = strtolower($team->name);
	    	}
	    	if($atts->team == null || in_array(strtolower($atts->team), $teams)){ // || $personteam == $atts->team){
	    		$personID = $person->ID;
                $name = $person->post_title;
                $main_pic = get_post_meta($personID, 'main_pic', true);
                $hometown = get_post_meta($personID, 'hometown', true);
                $major = get_post_meta($personID, 'major', true);
                $minor = get_post_meta($personID, 'minor', true);
                $graduation = get_post_meta($personID, 'graduation', true);
                $person_teams = implode(' ', $teams);

	    		$return .= "<div class='profile-list searchable'>" . 
	                            "<img width='75' height='100' "; 
					            if (empty($main_pic)) { 
					            	$return .= "class='no-pic'"; 
					            }  
					            $return .= "src='" . $main_pic ."' alt='" . $name . "' />" .
	                            	"<div class='info'>";
	                                if (get_option('husky_visible_setting')){
	                                    $return .= "<a href='" . get_permalink($personID) . "'>";
	                               	} 
	                                $return .= "<h3 class='name search-this'>" . $name . "</h3>";
	                                if (get_option('husky_visible_setting')){
	                                    $return .= "</a>";
	                                }
	                                $return .= "<p class='title search-this'>" . $position . "</p>" .
	                                	"<p class='hidden search-this'>" . $person_teams . "</p>";
	                                if ($phone){  
	                                	$return .= "<p><b>Telephone:</b>" . $phone . "</p>";
	                                } 
	                                if (trim($email)){ 
	                                	$return .= "<p><b>Email:</b> <a href='mailto:" . $email . "'>" . $email . "</a></p>";
	                                } 
	                            $return .= "</div>" .
	                        "</div>";
	    	}
	    }

    return $return; 


  }


?>
