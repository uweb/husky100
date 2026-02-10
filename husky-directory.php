<?php

    /*
    Plugin Name: Husky 100
    Plugin URI: http://www.washington.edu
    Description: Makes a people content type and directory template for the Husky 100
    Version: 1.8.2
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

function grab_husky100_page() {
    $query = new WP_Query(array('name'=>'husky_100','post_type'=>'page'));
    $query->the_post();
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
        ?><select name="tenet">
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

    add_action( 'pre_post_update', 'testy_test', 10, 2 );

    function testy_test($post_ID,$data) {
        // var_dump($post_ID,$data);
        // var_dump(wp_get_post_terms( $post_ID, 'filters', array( 'fields' => 'slugs' ) ));
        $terms = wp_get_post_terms( $post_ID, 'filters', array( 'fields' => 'slugs' ) );
        foreach ($terms as $term) {
            $transient_name = 'get_husky100_' . $term;
            delete_transient($transient_name);
        }
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
            delete_transient('get_husky100');
             // exit( var_dump( $_POST ) );
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
            return $this_dir . '/' . $husky_directory_template;
        }

        return $template;
    }

endif;

// if (!taxonomy_exists('filters')):

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
            'hierarchical'  => true,
            'public'=>true,
            'hierarchical'=>true,
            'show_ui'=>true,
            'query_var'=>true,
            'rewrite' => array(
                'slug' => 'year',
                'with_front' => false,
                'hierarchical' => false,
                'ep_mask' => EP_PAGES,
            ),
        ));
        register_taxonomy_for_object_type('filters', 'husky100');
        // flush_rewrite_rules();

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
        }   //Arts & Sci kids
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
        if(!get_term('2018', 'filters')){
            wp_insert_term(
              '2018', // the term
              'filters', // the taxonomy
              array(
                'slug' => '2018',
                'parent'=> $parent_term_year_awarded_id
              )
            );
        }
        if(!get_term('2019', 'filters')){
            wp_insert_term(
              '2019', // the term
              'filters', // the taxonomy
              array(
                'slug' => '2019',
                'parent'=> $parent_term_year_awarded_id
              )
            );
        }

    }

// endif;

add_filter('template_include', 'year_template_husky100');

function year_template_husky100( $template ) {
    if ( is_tax('filters') ) {
        $theme_files = array('husky-year-template.php', 'husky100/husky-year-template.php');
        $exists_in_theme = locate_template($theme_files, false);
        if ( $exists_in_theme != '' ) {
            return $exists_in_theme;
        } else {
            return plugin_dir_path(__FILE__) . 'husky-year-template.php';
        }
    }
    return $template;
}

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
  if ( !is_admin () ) {
    $script_path = plugin_dir_path( __FILE__ ) . 'js/husky100.js';
    $script_url  = plugin_dir_url( __FILE__ ) . 'js/husky100.js';
    $script_version = filemtime( $script_path );

    wp_register_script('husky100-js', $script_url, array('jquery'), $script_version, true);
    wp_enqueue_script('husky100-js');

    wp_register_style('husky100-style', plugins_url('css/husky100.css', __FILE__));
    wp_enqueue_style('husky100-style');

    wp_register_script('isotope-js','https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js', array('jquery'),null,false );

    //wp_register_script('fontawesome-js','https://kit.fontawesome.com/cd54b7bbd3.js', array('jquery'),null,false );

    /**
     * Font Awesome Kit Setup
     *
     * This will add your Font Awesome Kit to the front-end, the admin back-end,
     * and the login screen area.
     */
    // if (! function_exists('fa_custom_setup_kit') ) {
    //   function fa_custom_setup_kit($kit_url = '') {
    //     foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts'] as $action ) {
    //       add_action(
    //         $action,
    //         function () use ( $kit_url ) {
    //           error_log('kit ' .  print_r($kit_url, true));
    //           $kit_url = str_replace( )
    //           wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
    //         }
    //       );
    //     }
    //   }
    // }
    // fa_custom_setup_kit('https://kit.fontawesome.com/cd54b7bbd3.js');

function theme_enqueue_fontawesome() {
    wp_enqueue_script( 'theme-fontawesome', 'https://kit.fontawesome.com/cd54b7bbd3.js', [], null, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_fontawesome' );
function add_fontawesome_crossorigin_attr( $tag, $handle ) {
    // Check if the script handle is 'theme-fontawesome'
    if ( 'theme-fontawesome' === $handle ) {
        // Add the crossorigin attribute
        return str_replace( ' src', ' crossorigin="anonymous" src', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'add_fontawesome_crossorigin_attr', 10, 2 );




    //ajax stuff
    wp_localize_script( 'husky100-js', 'ajaxpagination', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        //'query_vars' => json_encode( $wp_query->query )
    ));
  }
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
