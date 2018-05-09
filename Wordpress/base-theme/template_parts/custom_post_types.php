<?php
/************************************************************
 * CUSTOM POST TYPES
 * Reference https://codex.wordpress.org/Post_Types
 * Supports array
 *     'title'
 *     'editor' (content)
 *     'author'
 *     'thumbnail' (featured image) (current theme must also support Post Thumbnails)
 *     'excerpt'
 *     'trackbacks'
 *     'custom-fields' (see Custom_Fields, aka meta-data)
 *     'comments' (also will see comment count balloon on edit screen)
 *     'revisions' (will store revisions)
 *     'page-attributes' (template and menu order) (hierarchical must be true)
 *     'post-formats'
 ****************************************************************/

function testimonials_custom_post_type()
{
    register_post_type('testimonials',
        [
            'labels'      => [
                'name'          => __('Testimonials'),
                'singular_name' => __('Testimonial'),
            ],
            'public'      => true,
            'supports' => array('title','thumbnail','revisions','editor'),
            'menu_position' => 20,
            // This is where we add taxonomies to our Custom Post Type
            'taxonomies' => array( 'category' ),
            'menu_icon' => 'dashicons-format-quote',
            'has_archive' => false,
        ]
    );
}
add_action('init', 'testimonials_custom_post_type');


