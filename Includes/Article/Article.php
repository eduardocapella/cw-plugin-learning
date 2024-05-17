<?php

// namespace Cwpl\Includes\Article;

class Article {

    function __construct() {
        add_action( 'init', array( $this, 'cw_cpt_articles' ) );
    }

    // The custom function to register a Article post type
    public function cw_cpt_articles() {

        // Set the labels, this variable is used in the $args array
        $labels = array(
            'name'               => __( 'Articles' ),
            'singular_name'      => __( 'Article' ),
            'add_new'            => __( 'Add New Article' ),
            'add_new_item'       => __( 'Add New Article' ),
            'edit_item'          => __( 'Edit Article' ),
            'new_item'           => __( 'New Article' ),
            'all_items'          => __( 'All Articles' ),
            'view_item'          => __( 'View Articles' ),
            'search_items'       => __( 'Search Articles' )
        );
        
        // The arguments for our post type, to be entered as parameter 2 of register_post_type()
        $args = array(
            'labels'            => $labels,
            'description'       => 'Holds our Articles',
            'public'            => true,
            'menu_position'     => 6,
            'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
            'has_archive'       => true,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'has_archive'       => true
        );
        
        // Call the actual WordPress function
        // Parameter 1 is a name for the post type
        // $args array goes in parameter 2.
        register_post_type( 'article', $args );

        // add_action( 'init', array( $this, 'cw_cpt_articles' ) );
    }
    
}

