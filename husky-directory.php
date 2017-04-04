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
	add_action('template_include', 'add_husky_directory_template', 99);

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

	add_action('admin_init', 'husky_admin_init');

	function husky_admin_init(){
		add_meta_box( 'hometown', 'Hometown', 'hometown_callback', 'husky100', 'side', 'low' );
		add_meta_box( 'major', 'Major', 'major_callback', 'husky100', 'side', 'low' );
		add_meta_box( 'minor', 'Minor', 'minor_callback', 'husky100', 'side', 'low' );
		add_meta_box( 'linkedin', 'LinkedIn link', 'linkedin_callback', 'husky100', 'side', 'low' );
		
		add_meta_box( 'tenet', 'Tenet', 'tenet_callback', 'husky100', 'normal', 'low' );
		add_meta_box( 'quote', 'Quote', 'quote_callback', 'husky100', 'normal', 'low' );

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

	function linkedin_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$linkedin = $custom['linkedin'][0];
		?><input name="linkedin" value="<?php echo $linkedin ?>" /><?php
	}

	function tenet_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$tenet = $custom['tenet'][0];
		?><select name="tenet"/>
			<option>Tenet</option>
			<option value="Undaunted" <?php echo ($tenet == "Undaunted") ? "selected" : ""; ?> >Undaunted</option>
			<option value="We > Me" <?php echo ($tenet == "We > Me") ? "selected" : ""; ?> >We > Me</option>
			<option value="Dare to Do" <?php echo ($tenet == "Dare to Do") ? "selected" : ""; ?> >Dare to Do</option>
			<option value="Be the First" <?php echo ($tenet == "Be the First") ? "selected" : ""; ?> >Be the First</option>
			<option value="Question the Answer" <?php echo ($tenet == "Question the Answer") ? "selected" : ""; ?> >Question the Answer</option>
			<option value="Passion Never Rests" <?php echo ($tenet == "Passion Never Rests") ? "selected" : ""; ?> >Passion Never Rests</option>
			<option value="Be A World of Good" <?php echo ($tenet == "Be A World of Good") ? "selected" : ""; ?> >Be A World of Good</option>
			<option value="Together We Will" <?php echo ($tenet == "Together We Will") ? "selected" : ""; ?> >Together We Will</option>
			<option value="Driven to Discover" <?php echo ($tenet == "Driven to Discover") ? "selected" : ""; ?> >Driven to Discover</option>
		</select><?php
	}

	function quote_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$quote = $custom['quote'][0];
		?><textarea name="quote" rows="4" cols="100"><?php echo $quote; ?></textarea><?php
	}

	add_action('save_post', 'save_person_details');

	function save_person_details() {
		global $post;
		if (get_post_type($post) == 'husky100') {
			update_post_meta($post->ID, 'hometown', $_POST['hometown']);
			update_post_meta($post->ID, 'major', $_POST['major']);
			update_post_meta($post->ID, 'minor', $_POST['minor']);
			update_post_meta($post->ID, 'linkedin', $_POST['linkedin']);
			update_post_meta($post->ID, 'tenet', $_POST['tenet']);
			update_post_meta($post->ID, 'quote', $_POST['quote']);
		}
	}

	// THIS IS BREAKING!!! 
	function add_husky_directory_template($template) {
		$this_dir = dirname(__FILE__);
		$current_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		//print_r($current_url . "</br>");
        //$custom_page = get_option('husky_directory_page_setting');
        $husky_directory_template = 'husky-directory-template.php';
        $is_directory = is_page('husky_100');
		if ($is_directory) {
			if (file_exists(get_stylesheet_directory() . '/' . $husky_directory_template)) {
				//print_r("stylesheet: " . get_stylesheet_directory() . "</br>");
				return get_stylesheet_directory() . '/' . $husky_directory_template;
			}
			else if (file_exists(get_template_directory() . '/' . $husky_directory_template)) {
				//print_r("template directory: " . get_template_directory());
				return get_template_directory() . '/' . $husky_directory_template;
			} 
			else if (file_exists($this_dir . '/' . $husky_directory_template)) {
				//print_r("Dir: " . $this_dir . '/' . $husky_directory_template . "</br>");
				return $this_dir . '/' . $husky_directory_template;
			}
		}
		return $template;
	}

endif;

if (!taxonomy_exists('filters')):

	add_action('init', 'filters_taxonomy');
	//add_action('restrict_manage_posts','restrict_people_by_year');
	//add_filter('parse_query','convert_husky100_id_to_taxonomy_term_in_query');
	//add_action('manage_husky100_posts_columns', 'add_year_column_to_husky100_list');
	//add_action('manage_posts_custom_column', 'show_year_column_for_husky100_list',10,2);

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
			'hierarchical'  => true,
			'public'=>true,
	        'hierarchical'=>true,
	        'show_ui'=>true,
	        'query_var'=>true
			//'show_ui'	  	=> false
		));
		register_taxonomy_for_object_type('filters', 'husky100');

		//defualts
		if(!get_term('Discipline', 'filters')){
			wp_insert_term('Discipline', 'filters');
		}
		if(!get_term('Campus', 'filters')){
			wp_insert_term('Campus', 'filters');
		}
		if(!get_term('Class Standing', 'filters')){
			wp_insert_term('Class Standing', 'filters', array('slug' => 'year'));
		}
		if(!get_term('Year Awarded', 'filters')){
			wp_insert_term('Year Awarded', 'filters', array('slug' => 'year-awarded-the-husky-100'));
		}
		//Discipline
		$parent_term = term_exists( 'Discipline', 'filters' ); // array is returned if taxonomy is given
		$parent_term_id = $parent_term['term_id']; // get numeric term id
		if(!get_term('Arts & Sci: All divisions', 'filters')){
			wp_insert_term(
			  'Arts & Sci: All divisions', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}	//Arts & Sci kids
			$parent_term_arts = term_exists( 'Arts & Sci: All divisions', 'filters' ); // array is returned if taxonomy is given
			$parent_term_id_arts = $parent_term_arts['term_id']; // get numeric term id
			if(!get_term('Arts & Sci: Arts', 'filters')){
				wp_insert_term(
				  'Arts & Sci: Arts', // the term 
				  'filters', // the taxonomy
				  array(
				    'parent'=> $parent_term_id_arts
				  )
				);
			}
			if(!get_term('Arts & Sci: Humanities', 'filters')){
				wp_insert_term(
				  'Arts & Sci: Humanities', // the term 
				  'filters', // the taxonomy
				  array(
				    'parent'=> $parent_term_id_arts
				  )
				);
			}
			if(!get_term('Arts & Sci: Natural Sci', 'filters')){
				wp_insert_term(
				  'Arts & Sci: Natural Sci', // the term 
				  'filters', // the taxonomy
				  array(
				    'parent'=> $parent_term_id_arts
				  )
				);
			}
			if(!get_term('Arts & Sci: Social Sci', 'filters')){
				wp_insert_term(
				  'Arts & Sci: Social Sci', // the term 
				  'filters', // the taxonomy
				  array(
				    'parent'=> $parent_term_id_arts
				  )
				);
			}

		if(!get_term('Built Environments', 'filters')){
			wp_insert_term(
			  'Built Environments', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Business', 'filters')){
			wp_insert_term(
			  'Business', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Dentistry', 'filters')){
			wp_insert_term(
			  'Dentistry', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Education', 'filters')){
			wp_insert_term(
			  'Education', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Engineering', 'filters')){
			wp_insert_term(
			  'Engineering', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Environment', 'filters')){
			wp_insert_term(
			  'Environment', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Computer Sci / Info / Tech', 'filters')){
			wp_insert_term(
			  'Computer Sci / Info / Tech', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Law', 'filters')){
			wp_insert_term(
			  'Law', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Medicine', 'filters')){
			wp_insert_term(
			  'Medicine', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Healthcare and Nursing', 'filters')){
			wp_insert_term(
			  'Healthcare and Nursing', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Pharmacy', 'filters')){
			wp_insert_term(
			  'Pharmacy', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Public Policy and Governance', 'filters')){
			wp_insert_term(
			  'Public Policy and Governance', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Public Health', 'filters')){
			wp_insert_term(
			  'Public Health', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Social Work and Criminal Justice', 'filters')){
			wp_insert_term(
			  'Social Work and Criminal Justice', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}
		if(!get_term('Urban Studies', 'filters')){
			wp_insert_term(
			  'Urban Studies', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_id
			  )
			);
		}

		//campus
		$parent_term_campus = term_exists( 'Campus', 'filters' ); // array is returned if taxonomy is given
		$parent_term_campus_id = $parent_term_campus['term_id']; // get numeric term id
		if(!get_term('Bothell', 'filters')){
			wp_insert_term(
			  'Bothell', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_campus_id
			  )
			);
		}
		if(!get_term('Seattle', 'filters')){
			wp_insert_term(
			  'Seattle', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_campus_id
			  )
			);
		}
		if(!get_term('Tacoma', 'filters')){
			wp_insert_term(
			  'Tacoma', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_campus_id
			  )
			);
		}

		//Year	
		$parent_term_year = term_exists( 'Class Standing', 'filters' ); // array is returned if taxonomy is given
		$parent_term_year_id = $parent_term_year['term_id']; // get numeric term id
		if(!get_term('Grad', 'filters')){
			wp_insert_term(
			  'Grad', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_year_id
			  )
			);
		}
		if(!get_term('Undergrad', 'filters')){
			wp_insert_term(
			  'Undergrad', // the term 
			  'filters', // the taxonomy
			  array(
			    'parent'=> $parent_term_year_id
			  )
			);
		}

		//Year awarded
		$parent_term_year_awarded = term_exists( 'Year Awarded', 'filters' ); // array is returned if taxonomy is given
		$parent_term_year_awarded_id = $parent_term_year_awarded['term_id']; // get numeric term id
		if(!get_term('2016', 'filters')){
			wp_insert_term(
			  '2016', // the term 
			  'filters', // the taxonomy
			  array(
			  	'slug' => '2016',
			    'parent'=> $parent_term_year_awarded_id
			  )
			);
		}
		if(!get_term('2017', 'filters')){
			wp_insert_term(
			  '2017', // the term 
			  'filters', // the taxonomy
			  array(
			  	'slug' => '2017',
			    'parent'=> $parent_term_year_awarded_id
			  )
			);
		}

	}


	function restrict_people_by_year() {
	    global $typenow;
	    global $wp_query;
	    if ($typenow=='husky100') {
	        $taxonomy = 'filters';
	        $filters_taxonomy = get_taxonomy($taxonomy);
	        $year_id = term_exists( 'Year Awarded', 'filters');
	        $term = isset($wp_query->query['filters']) ? $wp_query->query['filters'] :'';
	        wp_dropdown_categories(array(
	            'show_option_all' =>  __("All years awarded"),
	            'taxonomy'        =>  $taxonomy,
	            'name'            =>  'filters',
	            //'term'			  =>  'year-awarded',
	            //'orderby'         =>  'name',
	            'child_of'		  =>  $year_id['term_id'],
	            'selected'        =>  $term,
	            'hierarchical'    =>  true,
	            'depth'           =>  3,
	            'show_count'      =>  true, // Show # listings in parens
	            'hide_empty'      =>  false, // Don't show filters w/o people
	        ));
	    }
	}

	function convert_husky100_id_to_taxonomy_term_in_query($query) {
	    global $pagenow;
	    $qv = &$query->query_vars;
	    //print_r($qv);
	    if ($pagenow=='edit.php' &&
	            isset($qv['term']) && is_numeric($qv['term'])) {
	        $term = get_term_by('id',$qv['term'],'filters');
	    	print_r($term);
	        $qv['term'] = $term;
	    }

	    // global $pagenow;
	    // $type = 'post';
	    // if (isset($_GET['post_type'])) {
	    //     $type = $_GET['post_type'];
	    // }
	    // if ( 'husky100' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['filters']) && $_GET['filters'] != '') {
	    //     $query->query_vars['meta_key'] = 'filters';
	    //     $query->query_vars['meta_value'] = get_term($_GET['filters'], 'filters');
	    // }
	}

	function add_year_column_to_husky100_list( $posts_columns ) {
	    if (!isset($posts_columns['date'])) {
	        $new_posts_columns = $posts_columns;
	    } else {
	        $new_posts_columns = array();
	        $index = 0;
	        foreach($posts_columns as $key => $posts_column) {
	            if ($key=='date')
	                $new_posts_columns['filters'] = null;
	            $new_posts_columns[$key] = $posts_column;
	        }
	    }
	    $new_posts_columns['filters'] = 'Filters';
	    return $new_posts_columns;
	}

	
	function show_year_column_for_husky100_list( $column_name,$post_id ) {
	    global $typenow;
	    if ($typenow=='husky100') {
	        $taxonomy = 'filters';
	        switch ($column_name) {
	        case 'filters':
	            $filters = get_the_terms($post_id,$taxonomy);
	            if (is_array($filters)) {
	                foreach($filters as $key => $filter) {
	                    // $edit_link = get_term_link($filter,$taxonomy);
	                    // $filters[$key] = '<a href="'.$edit_link.'">' . $filter->name . '</a>';
	                    $filters[$key] = $filter->name;
	                }
	                //echo implode("<br/>",$filters);
	                echo implode(' | ',$filters);
	            }
	            break;
	        }
	    }
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

require( plugin_dir_path( __FILE__ ) . 'functions.php');

if ( ! post_type_exists( 'fastfacts' ) ):

	add_action('init', 'fast_facts_post_type');
	//add_action('template_include', 'add_husky_directory_template');

	function fast_facts_post_type() {
		$labels = array(
			'name' => 'Fast Facts',
			'singular_name' => 'Fast Facts',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Fast Facts',
			'edit_item' => 'Edit Fast Facts',
			'new_item' => 'New Fast Facts',
			'all_items' => 'All Fast Facts',
			'view_item' => 'View Fast Facts',
			'search_item' => 'Search Fast Facts',
			'not_found' => 'No fast facts found',
			'not_found_in_trash' => 'No fast facts found in trash',
			'parent_item_colon' => '',
			'menu_name' => 'Fast Facts'
		);

		$args = array(
			'labels' => $labels,
			'public' => false,
			'publicly_queryable' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'rewrite' => array('slug' => 'fastfacts', 'with_front' => false),
			'supports' => array( 'title' , 'thumbnail' )
		);

		register_post_type('fastfacts', $args);
	}

endif;



?>
