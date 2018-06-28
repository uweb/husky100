<?php
/*
  Template helper functions
*/

add_action( 'extend_uw_object', function($UW) {
  require( 'setup/uw.category-checklist.php' );
});

//$UW->Category_Checklist::init();

function my_enqueue_assets() {
    //wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_script( 'ajax-pagination',  get_stylesheet_directory_uri() . '/js/ajax-pagination.js', array( 'jquery' ), '1.0', true );
}


/*
  AJAX helper functions
*/
function ajax_pagination() {
    $currentyear = $_POST['currentyear'];

	//get people
    $args = array(
      'post_type' => 'husky100', 
      'posts_per_page' => -1,
      'tax_query' => array(
          array(
            'taxonomy' => 'filters',
            'field'    => 'slug',
            'terms'    => array( $currentyear ),
    		'operator' => 'NOT IN',
          ),
        ),
      );
    $query = new WP_Query($args);
    $people = $query->get_posts(); 
    shuffle($people);

    // $fastfactsargs = array('post_type' => 'fastfacts', 'posts_per_page' => -1);
    // $fastfactsquery = new WP_Query($fastfactsargs);
    // $fastfacts = $fastfactsquery->get_posts();

    $returnstring = '';

    $peoplecount = 1;
    $factcount = 0;
    $featureOffset = 12;
    foreach ( $people as $person ) {
       //gather assets
       $personimageurl = wp_get_attachment_image_src( get_post_thumbnail_id($person->ID) , array(200,300) );
       $personimageurl = $personimageurl[0];
       $personimageurlhigh = wp_get_attachment_image_src( get_post_thumbnail_id($person->ID) , $size = 'large' );
       $personimageurlhigh = $personimageurlhigh[0];
       if ( !$personimageurl ) {
        //set to default image here
        $personimageurl = plugin_dir_url( __FILE__ ) . 'assets/default.jpg';
        $personimageurlhigh = plugin_dir_url( __FILE__ ) . 'assets/default.jpg';
       }
       $hometown = get_post_meta($person->ID, 'hometown', true);
       $major = get_post_meta($person->ID, 'major', true);
       $minor = get_post_meta($person->ID, 'minor', true);
       $linkedin = get_post_meta($person->ID, 'linkedin', true);
       if ( strpos($linkedin, 'http') === false && strlen($linkedin) > 1) {
         $linkedin = "https://" . $linkedin;
       }
       $filters = wp_get_post_terms( $person->ID, 'filters' );
       $yearawarded = "";
       $tags = wp_get_post_terms( $person->ID, 'tags' );
       //FEATURE: do tags also need to be classes? 
       $personclasses = "";
       foreach ($filters as $filter ) {
           $personclasses .= $filter->slug . " ";
           if($filter->parent == "31" ) { //if parent is "year awarded"
            $yearawarded = $filter->name;
           }
       }
       if ( $peoplecount % $featureOffset == 3 ) {
            $personclasses .= "featured ";
       }

       // if( $peoplecount % $featureOffset == 9 ) { //determines where fast facts are
       //  $fact = $fastfacts[$peoplecount / $featureOffset];
       //  $factimageurl = wp_get_attachment_image_src( get_post_thumbnail_id($fact->ID) , array(200,300) );
       //  $factimageurl = $factimageurl[0];
       //  $factimageurlhigh = wp_get_attachment_image_src( get_post_thumbnail_id($fact->ID) , $size = 'large' );
       //  $factimageurlhigh = $factimageurlhigh[0];
        
       //  $returnstring += '<li tabindex="0" data-name="' + $fact->post_name + '" class="flip-container grid-item special infographic">' +
			    //               '<h3>' + $fact->post_title + '</h3>' +
			    //         '</li>';
  
       // }

        $returnstring .= '<li tabindex="0" data-name="' . $person->post_name . '" data-img="' . $personimageurlhigh . '" class="flip-container grid-item ' . $personclasses . '">' .
					        '<div class="flipper" role="button" aria-expanded="false">' .
					          '<div class="front lazy" data-src="' . $personimageurl . '">' .
					          '</div>' .
					          '<div class="back">' .
					            '<p class="back-title">' . $person->post_title . '</p>' .
					            '<p class="major">' . $major . '</p>' .
					          '</div>' .
					          '<div tabindex="0" class="full-bio" aria-hidden="true">' .
					            '<h2>'. $person->post_title ;
       	$returnstring .= (!empty($linkedin) ? '<a target="_blank" class="linkedin" href="' . $linkedin . '">LinkedIn</a>' : ''); 
       	$returnstring .= 		'</h2>' .
					            '<div class="bio-info">' .
					              '<p>' . $hometown . '</p>' .
					              '<p>' . $major . '</p>' .             
					              '<p>' . $minor . '</p>' . 
					              '<p class="year-awarded">Year awarded ' . $yearawarded . '</p>' .             
					            '</div>' .
					            '<div class="bio-text">' .
					              '<p>' . $person->post_content . '</p>' .
					            '</div>' .
					            '<div class="tags">';
        foreach ($tags as $tag ) {
            $returnstring .= '<a href="#">' . $tag->name . '</a>';
        }
		$returnstring .=        '</div>' .
					          '</div>' .
					        '</div>' .
					      '</li>';
        $peoplecount++;
    }

    echo $returnstring;
    die();
}


add_action( 'wp_ajax_nopriv_ajax_pagination', 'ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'ajax_pagination' );

?>
