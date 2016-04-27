<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> <?php wp_title(' | ',TRUE,'right'); bloginfo('name'); ?> </title>
        <meta charset="utf-8">
        <meta name="description" content="<?php bloginfo('description', 'display'); ?>">
        <meta name="viewport" content="width=device-width">

        <?php wp_head(); ?>

        <!--[if lt IE 9]>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/html5shiv.js" type="text/javascript"></script>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/respond.js" type="text/javascript"></script>
            <link rel='stylesheet' href='<?php bloginfo("template_directory"); ?>/assets/ie/css/ie.css' type='text/css' media='all' />
        <![endif]--> 
        
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>
      <link rel='stylesheet' href='<?php echo plugin_dir_url( __FILE__ ) . '../uw-template-hierarchy/thinstrip.css' ?>' type='text/css' media='all' />
      <link rel='stylesheet' href='<?php echo plugin_dir_url( __FILE__ ) . '../uw-template-hierarchy/module-hero-image.css' ?>' type='text/css' media='all' />

      

    </head>
    <body <?php body_class(); ?> id="husky100">
    <a href="#main_content" class="screen-reader-shortcut">Skip to main content</a>

    <div id="thin-strip">
        <a class="wordmark" href="http://uw.edu" tabindex="-1" title="University of Washington Home">Home</a>
        <ul>
            <li class="facebook"><a href="https://www.facebook.com/UofWA" title="Facebook">Facebook</a></li>
            <li class="twitter"><a href="https://twitter.com/uw" title="Twitter">Twitter</a></li>
            <li class="instagram"><a href="http://instagram.com/uofwa" title="Instagram">Instagram</a></li>
            <li class="youtube"><a href="http://www.youtube.com/uwhuskies" title="YouTube">YouTube</a></li>
            <li><a href="http://uw.edu/students" class="slash" title="Students">Students</a></li>
            <li><a href="http://uw.edu/parents" class="slash" title="Parents">Parents</a></li>
            <li><a href="http://uw.edu/facultystaff" class="slash" title="Faculty &amp; Staff">Faculty &amp; Staff</a></li>
            <li><a href="http://uw.edu/alumni" class="slash" title="Alumi">Alumni</a></li>
        </ul>
    </div>
 

    <div class="module-hero-image" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>')">
      <div class="container">     
        <div class="row">
          <h1><?php the_title(); ?></h1>
          <div class="udub-slant"><span></span></div>
          <?php 
              while ( have_posts() ) : the_post(); 
                the_content();
              endwhile;
           ?>
        </div>
      </div>
    </div>
    <!-- FEATURE: dynamically load the filters - Now a dropdown structure --> 
    <ul id="filter">
   <!--  <li>
        <button data-filter=":not(.title-card)">Show All <div class="udub-slant"><span></span></div></button>        
    </li> -->
    <li class="sort_by">
      Filter by:
    </li>
    <li>
      <a id="clear" href="#" title="Clear filter">
      <svg xmlns="http://www.w3.org/2000/svg" width="35.848" height="35.794" viewBox="0 0 35.848 35.794"><circle fill="#DEDEDD" cx="17.999" cy="17.999" r="16.998"/><g fill="none" stroke="#FFF" stroke-width="3" stroke-miterlimit="10"><path d="M11.485 24.513l13.027-13.028M24.512 24.513L11.485 11.485"/></g></svg>Clear      
      </a>
    </li>
    <?php
        //get filters
        //foreach filter print button
        //set current filter
        //reflect that in filter box
        //
        $filter_parent_terms = get_terms('filters', array(
            'hide_empty' => false,
            'parent' => 0
        ));
        foreach ($filter_parent_terms as $parent) {
             echo '<li class="select">
                     <select>' . '<option>' . $parent->name . '</option>';

             foreach ( get_terms( 'filters', array( 'hide_empty' => false, 'parent' => $parent->term_id ) ) as $child ) {
                if ($child->slug == 'arts-sci-all-divisions') {
                    echo '<option value=".arts-sci-arts, .arts-sci-humanities, .arts-sci-natural-sci, .arts-sci-social-sci, .arts-sci-all-divisions">' . $child->name . '</option>';
                    $childrens = get_terms( 'filters', array( 'hide_empty' => false, 'parent' => $child->term_id ) );
                    foreach ( $childrens as $children ) {
                        echo '<option value=".' . $children->slug . '">&emsp;' . $children->name . '</option>';
                    }
                } else {
                    echo '<option value=".' . $child->slug . '">' . $child->name . '</option>';
                }
             }

             echo '</select>        
                   </li>';
        }

        //print_r($filterneum_terms);
        // foreach ($terms as $term) {
        //     echo '<li>
        //             <button data-filter=".' . $term->slug . '">' . $term->name . ' <div class="udub-slant"><span></span></div></button>        
        //           </li>';
        //     print_r($term);
        // }
    ?>
      <li class="search_slash">
        <a title="Search button" id="searcher" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="26.396" height="55.35" viewBox="0 0 26.396 55.35" aria-hidden="true"><path fill="#4B2E83" d="M2.146 20.753l5.372-5.365c1.378.973 3.054 1.55 4.866 1.55h.002c4.672 0 8.473-3.8 8.473-8.47C20.857 3.798 17.057 0 12.385 0c-4.67 0-8.47 3.8-8.47 8.468 0 1.763.543 3.4 1.468 4.758L0 18.603l2.146 2.15zm10.24-17.917c3.11 0 5.64 2.526 5.64 5.632 0 3.107-2.53 5.635-5.64 5.635-3.106 0-5.634-2.528-5.634-5.635 0-3.104 2.527-5.63 5.634-5.632zm6.22 32.162c0-.414-.162-.804-.455-1.095-.585-.59-1.605-.59-2.193 0l-5.588 5.583-5.585-5.584c-.588-.588-1.612-.587-2.195 0-.294.292-.456.682-.456 1.096s.162.804.455 1.098l5.585 5.586-5.587 5.586c-.294.295-.456.687-.455 1.102 0 .413.163.8.45 1.087.58.593 1.614.597 2.2.004l5.585-5.584 5.584 5.582c.29.297.683.46 1.1.46s.81-.163 1.097-.455c.292-.292.454-.68.455-1.093.002-.415-.16-.807-.455-1.102l-5.586-5.586 5.587-5.586c.294-.294.455-.684.455-1.098z"/></svg></a>        
      </li>
    </ul>

    <div id="searcher_wrap">
      <input type="text" class="quicksearch" placeholder="Start typing" />
    </div>
  

    <!-- Add this to  ontouchstart="this.classList.toggle('hover');" -->
    <?php
    //sort of students will all occur here
        
    $args = array('post_type' => 'husky100', 'posts_per_page' => -1);
    $query = new WP_Query($args);
    $people = $query->get_posts(); 
    shuffle($people);

    $fastfactsargs = array('post_type' => 'fastfacts', 'posts_per_page' => -1);
    $fastfactsquery = new WP_Query($fastfactsargs);
    $fastfacts = $fastfactsquery->get_posts();

    ?>

    <div id="main-content">
         
         <!-- This hides the stuttering of tiles during load -->
        <div id="overlay"></div>

         <div class="grid">

         <div class="grid-sizer"></div>

         <!-- FILTER BOX -->
         <?php 
         // $filter_terms = get_terms('filters', array(
         //     'hide_empty' => false,
         // ));
         // // foreach ($filter_terms as $term) {
         // //     echo    '<div class="grid-item special title-card stamp ' . $term->slug . '">
         // //                <h2>' . $term->name . '</h2>
         // //                <div class="udub-slant"><span></span></div>
         // //                <p>' . $term->description . '</p>
         // //              </div>';
         // // }
         // $tag_terms = get_terms('tags');
         // foreach ($tag_terms as $tag_term) {
         //     echo    '<div class="grid-item special title-card ' . $tag_term->slug . '">
         //                <h2 class="tags">' . $tag_term->name . '</h2>
         //                <div class="udub-slant"><span></span></div>
         //                <p>' . $tag_term->description . '</p>
         //              </div>';
         // }
          ?>


        <!-- THE FUN PHP STUFF -->
        <?php
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
           if ( strpos($linkedin, 'http') === false ) {
             $linkedin = "https://" . $linkedin;
           }
           $filters = wp_get_post_terms( $person->ID, 'filters' );
           $tags = wp_get_post_terms( $person->ID, 'tags' );
           //FEATURE: do tags also need to be classes? 
           $personclasses = "";
           foreach ($filters as $filter ) {
               $personclasses .= $filter->slug . " ";
           }
           if ( $peoplecount % $featureOffset == 3 ) {
                $personclasses .= "featured ";
           }

           if( $peoplecount % $featureOffset == 9 ) { //determines where fast facts are
            $fact = $fastfacts[$peoplecount / $featureOffset];
            $factimageurl = wp_get_attachment_image_src( get_post_thumbnail_id($fact->ID) , array(200,300) );
            $factimageurl = $factimageurl[0];
            $factimageurlhigh = wp_get_attachment_image_src( get_post_thumbnail_id($fact->ID) , $size = 'large' );
            $factimageurlhigh = $factimageurlhigh[0];
            ?>
                <div tabindex="0" data-name="<?php echo $fact->post_name; ?>" class="flip-container grid-item special infographic">
                    <div >
                      <div class="front">
                        <img src="<?php echo $factimageurlhigh; ?>" alt="<?php echo $fact->post_title; ?>">
                      </div>
                    </div>
                  </div>
            <?php
           }

           //spit out html 
           ?>
            <div tabindex="0" data-name="<?php echo $person->post_name; ?>" data-img="<?php echo $personimageurlhigh; ?>" class="flip-container grid-item <?php echo $personclasses; ?>">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . $personimageurl . ');'; ?> ">
              </div>
              <div class="back">
                <h3><?php echo $person->post_title; ?></h3>
                <!-- <p><?php echo $hometown; ?></p> -->
                <p class="major"><?php echo $major; ?></p> 
              </div>
              <div tabindex="0" class="full-bio">
                <h2><?php echo $person->post_title; ?>\
                <?php echo !empty($linkedin) ? '<a class="linkedin" href="' . $linkedin . '">LinkedIn</a>' : '' ?></h2>
                <div class="bio-info">
                  <p><?php echo $hometown; ?></p>
                  <p><?php echo $major; ?></p>                
                </div>
                <div class="bio-text">
                  <p><?php echo $person->post_content; ?></p>
                </div>
                <div class="tags">
                <?php foreach ($tags as $tag ) {
                    echo '<a href="#">' . $tag->name . '</a>';
                } ?>
                </div>
              </div>
            </div>
          </div>




        <?php
            $peoplecount++;
        }

        ?>


         </div>   

    </div>
    









</body>
</html>