<?php

/*
Controller name: husky100
Controller description: Necessary json for the Husky 100 ajax requests using the JSON API Plugin
*/

class json_api_husky100_controller
{

    public function get_husky100_years() {
        global $json_api;

        $transient_name = 'get_husky100';

        if (isset($json_api->query->filter)) {

            $filter = sanitize_title_for_query($json_api->query->filter);

            $transient_name .= '_' . sanitize_title_for_query($filter);

        }
        $people_args = array();
        if ($filter) {
            $people_args = array(
                                array(
                                    'taxonomy' => 'filters',
                                    'field' => 'slug',
                                    'terms' => $filter,
                                    'operator' => 'IN',
                                )
                            );
        }
        // delete_transient( $transient_name );

        $data_timeout = get_option('_transient_timeout_' . $transient_name);
        $transient = ( $data_timeout < time() ) ? false : true ;

        if ( $transient == true ) {
            $results = get_transient( $transient_name );
        }
        else {
            $people = get_posts(
                array (
                    'post_type' => 'husky100',
                    'posts_per_page' => -1,
                    'tax_query' => $people_args
                )
            );
            $args = array('parent' => 0);
            $categories = get_terms( 'filters', $args);
            foreach ($categories as $key) {
                $campus_id[$key->name] = $key->term_id;
            }
            foreach ($people as $person) {
                $result                   = new stdClass();

                $year_awarded = wp_get_post_terms( $person->ID, 'filters', array( 'parent' => $campus_id['Year Awarded'] ) );
                $year_awarded = $year_awarded[0]->slug;

                $tag = wp_get_post_terms( $person->ID, 'tags', array( 'fields' => 'names' ) );
                $tags = '';
                if ( ! empty( $tag ) ) {
                    $tags = implode( ', ', $tag );
                }


                $personimageurl = wp_get_attachment_image_src( get_post_thumbnail_id($person->ID) , array(200,300) );
                $personimageurl = $personimageurl[0];
                $personimageurlhigh = wp_get_attachment_image_src( get_post_thumbnail_id($person->ID) , $size = 'husky100_large' );
                $personimageurlhigh = $personimageurlhigh[0];
                if ( !$personimageurl ) {
                    $personimageurl = plugin_dir_url( dirname( __FILE__ ) ) . 'assets/default.jpg';
                    $personimageurlhigh = plugin_dir_url( dirname( __FILE__ ) ) . 'assets/default.jpg';
                }

                $meta                   = get_post_custom($person->ID);
                $result->{id}           = $person->ID;
                $result->{post_title}   = $person->post_title;
                $result->{slug}         = $person->post_name;
                $result->{content}      = apply_filters( 'the_content', $person->post_content );
                $result->{img}          = $personimageurl;
                $result->{img_highres}  = $personimageurlhigh;
                $result->{hometown}     = $meta['hometown'][0];
                $result->{major}        = $meta['major'][0];
                $result->{minor}        = $meta['minor'][0];
                $result->{linkedin}     = $meta['linkedin'][0];
                $result->{year_awarded} = $year_awarded;
                $result->{tags}         = $tags;
                $result->{classes}      = wp_get_post_terms( $person->ID, 'filters', array( 'fields' => 'slugs' ) );

                $results[]              = $result;
            }
            set_transient( $transient_name, $results, 48 * HOUR_IN_SECONDS );
        }

        return $this->posts_object_result($results, null);
    }

    public function get_recipient() {
        global $json_api;

        if (isset($json_api->query->name)) {
            $name = sanitize_title_for_query($json_api->query->name);
        } else {
            die;
        }

        $people = get_posts(
            array (
                'post_type' => 'husky100',
                'name' => $name,
                'posts_per_page' => -1,
            )
        );
        $args = array('parent' => 0);
        $categories = get_terms( 'filters', $args);
        foreach ($categories as $key) {
            $campus_id[$key->name] = $key->term_id;
        }
        foreach ($people as $person) {
            $result                   = new stdClass();

            $year_awarded = wp_get_post_terms( $person->ID, 'filters', array( 'parent' => $campus_id['Year Awarded'] ) );
            $year_awarded = $year_awarded[0]->slug;

            $tags = wp_get_post_terms( $person->ID, 'tags', array( 'fields' => 'names' ) );
            // $tags = '';
            // if ( ! empty( $tag ) ) {
            //     $tags = implode( ', ', $tag );
            // }


            $personimageurl = wp_get_attachment_image_src( get_post_thumbnail_id($person->ID) , array(200,300) );
            $personimageurl = $personimageurl[0];
            $personimageurlhigh = wp_get_attachment_image_src( get_post_thumbnail_id($person->ID) , $size = 'husky100_large' );
            $personimageurlhigh = $personimageurlhigh[0];
            if ( !$personimageurl ) {
                $personimageurl = plugin_dir_url( dirname( __FILE__ ) ) . 'assets/default.jpg';
                $personimageurlhigh = plugin_dir_url( dirname( __FILE__ ) ) . 'assets/default.jpg';
            }

            $meta                   = get_post_custom($person->ID);
            $result->{id}           = $person->ID;
            $result->{post_title}   = $person->post_title;
            $result->{slug}         = $person->post_name;
            $result->{content}      = apply_filters( 'the_content', $person->post_content );
            $result->{img}          = $personimageurl;
            $result->{img_highres}  = $personimageurlhigh;
            $result->{hometown}     = $meta['hometown'][0];
            $result->{major}        = $meta['major'][0];
            $result->{minor}        = $meta['minor'][0];
            $result->{linkedin}     = $meta['linkedin'][0];
            $result->{year_awarded} = $year_awarded;
            $result->{tags}         = $tags;
            $result->{classes}      = wp_get_post_terms( $person->ID, 'filters', array( 'fields' => 'slugs' ) );

            $results[]              = $result;
        }

        return $this->posts_object_result($results, null);
    }

    public function admit_husky100() {
        global $json_api;

        $transient_name = 'admit_husky100';

        $people_args = array(
            array(
                'taxonomy' => 'filters',
                'field' => 'slug',
                'terms' => get_option('default_year'),
                'operator' => 'IN',
            )
        );
        // delete_transient( $transient_name );

        $data_timeout = get_option('_transient_timeout_' . $transient_name);
        $transient = ( $data_timeout < time() ) ? false : true ;

        if ( $transient == true ) {
            $results = get_transient( $transient_name );
        }
        else {
            $people = get_posts(
                array (
                    'post_type' => 'husky100',
                    'tax_query' => $people_args,
                    'orderby' => 'rand',
                    'posts_per_page' => 3,

                )
            );
            $args = array('parent' => 0);
            $categories = get_terms( 'filters', $args);
            foreach ($categories as $key) {
                $campus_id[$key->name] = $key->term_id;
            }
            foreach ($people as $person) {
                $result                   = new stdClass();

                $year_awarded = wp_get_post_terms( $person->ID, 'filters', array( 'parent' => $campus_id['Year Awarded'] ) );
                $year_awarded = $year_awarded[0]->slug;

                $tag = wp_get_post_terms( $person->ID, 'tags', array( 'fields' => 'names' ) );
                $tags = '';
                if ( ! empty( $tag ) ) {
                    $tags = implode( ', ', $tag );
                }


                $personimageurl = wp_get_attachment_image_src( get_post_thumbnail_id($person->ID) , array(200,300) );
                $personimageurl = $personimageurl[0];
                if ( !$personimageurl ) {
                    $personimageurl = plugin_dir_url( dirname( __FILE__ ) ) . 'assets/default.jpg';
                }

                $meta                   = get_post_custom($person->ID);
                $result->{id}           = $person->ID;
                $result->{post_title}   = $person->post_title;
                $result->{slug}         = $person->post_name;
                $result->{content}      = apply_filters( 'the_content', $person->post_content );
                $result->{img}          = $personimageurl;
                $result->{hometown}     = $meta['hometown'][0];
                $result->{major}        = $meta['major'][0];
                $result->{minor}        = $meta['minor'][0];
                $result->{year_awarded} = $year_awarded;
                $result->{classes}      = wp_get_post_terms( $person->ID, 'filters', array( 'fields' => 'slugs' ) );

                $results[]              = $result;
            }
            // set_transient( $transient_name, $results, 48 * HOUR_IN_SECONDS );
        }

        return $this->posts_object_result($results, null);
    }

    public function error() {
        global $json_api;
        $json_api->error("That method does not exist");
    }

    protected function posts_object_result($posts, $object) {
        return array(
            'count' => count($posts),
            'posts' => $posts
        );
    }

}
    ?>