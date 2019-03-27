<?php

/*
Controller name: husky100
Controller description: Necessary json for the Husky 100 ajax requests using the JSON API Plugin
*/

class json_api_husky100_controller
{

    function json_api_husky100_controller() {
        $this->categories = $this->getCategoryNames();
    }

    public function get_husky100() {

        global $json_api;

        $data_timeout = get_option('_transient_timeout_' . 'get_husky100');
        if ($data_timeout < time()) {
            $transient = false;
        }
        else {
            $transient = true;
        }

        if ( $transient == true )
        {
            $results = get_transient( 'get_husky100' );
        } else {
            $people = get_posts(
                array (
                    'post_type' => 'husky100',
                    'numberposts' => 100,
                )
            );
            $args = array('parent' => 0);
            $categories = get_terms( 'filters', $args);
            foreach ($categories as $key) {
                $campus_id[$key->name] = $key->term_id;
            }
            foreach ($people as $person) {
                $result = new stdClass();
                $year_awarded = wp_get_post_terms( $person->ID, 'filters', array( 'parent' => $campus_id['Year Awarded'] ) )[0]->slug;

                $personimageurl = wp_get_attachment_image_src( get_post_thumbnail_id($person->id) , array(200,300) );
                $personimageurl = $personimageurl[0];
                $personimageurlhigh = wp_get_attachment_image_src( get_post_thumbnail_id($person->id) , $size = 'husky100_large' );
                $personimageurlhigh = $personimageurlhigh[0];
                if ( !$personimageurl ) {
                    $personimageurl = plugin_dir_url( __FILE__ ) . 'assets/default.jpg';
                    $personimageurlhigh = plugin_dir_url( __FILE__ ) . 'assets/default.jpg';
                }

                $tag = wp_get_post_terms( $person->ID, 'tags', array( 'fields' => 'names' ) );
                $tags = '';
                if ( ! empty( $tag ) ) {
                    $tags = implode( ', ', $tag );
                }

                if ( ! empty( $discipline ) ) {
                    $terms_string = implode( ' ', $discipline );
                } else {
                    $terms_string = '';
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

            set_transient( 'get_husky100', $results, 12 * HOUR_IN_SECONDS );
        }

        return $this->posts_object_result($results, null);

    }

    public function get_husky100_years() {
        global $json_api;

        $transient_name = 'get_husky100';

        if (isset($json_api->query->filter)) {

            $filter = sanitize_title_for_query($json_api->query->filter);

            $transient_name .= '_' . sanitize_title_for_query($filter);

        }


        $data_timeout = get_option('_transient_timeout_' . $transient_name);
        $transient = ( $data_timeout < time() ) ? false : true ;

        if ( $transient == true )
        {
            $results = get_transient( $transient_name );
        } else {
            $people = get_posts(
                array (
                    'post_type' => 'husky100',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'filters',
                            'field' => 'slug',
                            'terms' => $filter,
                            'operator' => 'IN',
                        ),
                    ),
                )
            );
            $args = array('parent' => 0);
            $categories = get_terms( 'filters', $args);
            foreach ($categories as $key) {
                $campus_id[$key->name] = $key->term_id;
            }
            foreach ($people as $person) {
                $result                   = new stdClass();

                $year_awarded = wp_get_post_terms( $person->ID, 'filters', array( 'parent' => $campus_id['Year Awarded'] ) )[0]->slug;

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
            set_transient( $transient_name, $results, 12 * HOUR_IN_SECONDS );
        }

        return $this->posts_object_result($results, null);
    }

    public function error() {
        global $json_api;
        $json_api->error("That method does not exist");
    }

    protected function pluckCategorySlugs( $ids = array() ) {
        foreach ( $ids as $id ) {
            $categories[] = $this->categories[$id];
        }
        return $categories;
    }

    protected function getCategoryNames(){
        $category = array();
        $categories = get_categories();
        foreach ( $categories as $c) {
            $category[$c->term_id] = $c->slug;
        }
        return $category;
    }

    protected function posts_object_result($posts, $object) {
        return array(
            'count' => count($posts),
            'posts' => $posts
        );
    }

}
    ?>