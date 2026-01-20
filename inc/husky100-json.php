<?php

/*
Controller name: husky100
Controller description: Necessary json for the Husky 100 ajax requests using the JSON API Plugin
*/

class json_api_husky100_controller
    {
        public function get_husky100_years(): array {
            global $json_api;
    
            $transient_name = 'get_husky100';
    
            $filter = $_GET['filter'] ?? '';
            $filter = sanitize_title_for_query($filter);
            $transient_name .= $filter ? '_' . $filter : '';
    
            $people_args = [];
            if ($filter) {
                $people_args = [
                    [
                        'taxonomy' => 'filters',
                        'field' => 'slug',
                        'terms' => $filter,
                        'operator' => 'IN',
                    ]
                ];
            }
    
            delete_transient($transient_name);
    
            $results = get_transient($transient_name);
            if ($results === false) {
                $people = get_posts([
                    'post_type' => 'husky100',
                    'posts_per_page' => -1,
                    'tax_query' => $people_args
                ]);
    
                $categories = get_terms('filters', ['parent' => 0]);
                $campus_id = [];
                foreach ($categories as $key) {
                    $campus_id[$key->name] = $key->term_id;
                }
    
                $results = [];
                foreach ($people as $person) {
                    $result = new stdClass();
    
                    $year_awarded = wp_get_post_terms($person->ID, 'filters', ['parent' => $campus_id['Year Awarded']]);
                    $year_awarded = $year_awarded[0]->slug ?? '';
    
                    $tags = wp_get_post_terms($person->ID, 'tags', ['fields' => 'names']);
                    $tags = !empty($tags) ? implode(', ', $tags) : '';
    
                    $personimageurl = wp_get_attachment_image_src(get_post_thumbnail_id($person->ID), [200, 300])[0] ?? '';
                    $personimageurlhigh = wp_get_attachment_image_src(get_post_thumbnail_id($person->ID), 'husky100_large')[0] ?? '';
                    if (!$personimageurl) {
                        $personimageurl = plugin_dir_url(dirname(__FILE__)) . 'assets/default.jpg';
                        $personimageurlhigh = plugin_dir_url(dirname(__FILE__)) . 'assets/default.jpg';
                    }
    
                    $meta = get_post_custom($person->ID);
                    $result->id = $person->ID;
                    $result->post_title = $person->post_title;
                    $result->slug = $person->post_name;
                    $result->content = apply_filters('the_content', $person->post_content);
                    $result->img = $personimageurl;
                    $result->img_highres = $personimageurlhigh;
                    $result->hometown = $meta['hometown'][0] ?? '';
                    $result->major = $meta['major'][0] ?? '';
                    $result->minor = $meta['minor'][0] ?? '';
                    $result->linkedin = $meta['linkedin'][0] ?? '';
                    $result->year_awarded = $year_awarded;
                    $result->tags = $tags;
                    $result->classes = wp_get_post_terms($person->ID, 'filters', ['fields' => 'slugs']);
    
                    $results[] = $result;
                }
                set_transient($transient_name, $results, 48 * HOUR_IN_SECONDS);
            }
    
            return $this->posts_object_result($results);
        }
    
        public function get_recipient(): array {
            global $json_api;
    
            $name = $_GET['name'] ?? '';
            if (!$name) {
                return $this->error();
            }
    
            $name = sanitize_title_for_query($name);
    
            $people = get_posts([
                'post_type' => 'husky100',
                'name' => $name,
                'posts_per_page' => -1,
            ]);
    
            $categories = get_terms('filters', ['parent' => 0]);
            $campus_id = [];
            foreach ($categories as $key) {
                $campus_id[$key->name] = $key->term_id;
            }
    
            $results = [];
            foreach ($people as $person) {
                $result = new stdClass();
    
                $year_awarded = wp_get_post_terms($person->ID, 'filters', ['parent' => $campus_id['Year Awarded']]);
                $year_awarded = $year_awarded[0]->slug ?? '';
    
                $tags = wp_get_post_terms($person->ID, 'tags', ['fields' => 'names']);
    
                $personimageurl = wp_get_attachment_image_src(get_post_thumbnail_id($person->ID), [200, 300])[0] ?? '';
                $personimageurlhigh = wp_get_attachment_image_src(get_post_thumbnail_id($person->ID), 'husky100_large')[0] ?? '';
                if (!$personimageurl) {
                    $personimageurl = plugin_dir_url(dirname(__FILE__)) . 'assets/default.jpg';
                    $personimageurlhigh = plugin_dir_url(dirname(__FILE__)) . 'assets/default.jpg';
                }
    
                $meta = get_post_custom($person->ID);
                $result->id = $person->ID;
                $result->post_title = $person->post_title;
                $result->slug = $person->post_name;
                $result->content = apply_filters('the_content', $person->post_content);
                $result->img = $personimageurl;
                $result->img_highres = $personimageurlhigh;
                $result->hometown = $meta['hometown'][0] ?? '';
                $result->major = $meta['major'][0] ?? '';
                $result->minor = $meta['minor'][0] ?? '';
                $result->linkedin = $meta['linkedin'][0] ?? '';
                $result->year_awarded = $year_awarded;
                $result->tags = $tags;
                $result->classes = wp_get_post_terms($person->ID, 'filters', ['fields' => 'slugs']);
    
                $results[] = $result;
            }
    
            return $this->posts_object_result($results);
        }
    
        public function admit_husky100(): array {
            global $json_api;
    
            $transient_name = 'admit_husky100';
    
            $people_args = [
                'relation' => 'AND',
                [
                    'taxonomy' => 'filters',
                    'field' => 'slug',
                    'terms' => [get_option('default_year')],
                    'operator' => 'IN',
                ],
                [
                    'taxonomy' => 'filters',
                    'field' => 'slug',
                    'terms' => ['seattle'],
                    'operator' => 'IN',
                ],
                [
                    'taxonomy' => 'filters',
                    'field' => 'slug',
                    'terms' => ['undergrad'],
                    'operator' => 'IN',
                ],
            ];
    
            delete_transient($transient_name);
    
            $results = get_transient($transient_name);
            if ($results === false) {
                $people = get_posts([
                    'post_type' => 'husky100',
                    'tax_query' => $people_args,
                    'orderby' => 'rand',
                    'posts_per_page' => 3,
                ]);
    
                $categories = get_terms('filters', ['parent' => 0]);
                $campus_id = [];
                foreach ($categories as $key) {
                    $campus_id[$key->name] = $key->term_id;
                }
    
                $results = [];
                foreach ($people as $person) {
                    $result = new stdClass();
    
                    $year_awarded = wp_get_post_terms($person->ID, 'filters', ['parent' => $campus_id['Year Awarded']]);
                    $year_awarded = $year_awarded[0]->slug ?? '';
    
                    $tags = wp_get_post_terms($person->ID, 'tags', ['fields' => 'names']);
                    $tags = !empty($tags) ? implode(', ', $tags) : '';
    
                    $personimageurl = wp_get_attachment_image_src(get_post_thumbnail_id($person->ID), 'full')[0] ?? '';
                    if (!$personimageurl) {
                        $personimageurl = plugin_dir_url(dirname(__FILE__)) . 'assets/default.jpg';
                    }
    
                    $meta = get_post_custom($person->ID);
                    $result->id = $person->ID;
                    $result->post_title = $person->post_title;
                    $result->slug = $person->post_name;
                    $result->content = apply_filters('the_content', $person->post_content);
                    $result->img = $personimageurl;
                    $result->hometown = $meta['hometown'][0] ?? '';
                    $result->major = $meta['major'][0] ?? '';
                    $result->minor = $meta['minor'][0] ?? '';
                    $result->year_awarded = $year_awarded;
                    $result->classes = wp_get_post_terms($person->ID, 'filters', ['fields' => 'slugs']);
    
                    $results[] = $result;
                }
                set_transient($transient_name, $results, 48 * HOUR_IN_SECONDS);
            }
    
            return $this->posts_object_result($results);
        }
    
        public function error(): array {
            global $json_api;
            $json_api->error("That method does not exist");
            return [];
        }
    
        protected function posts_object_result(array $posts): array {
            return [
                'count' => count($posts),
                'posts' => $posts
            ];
        }
    }
    ?>