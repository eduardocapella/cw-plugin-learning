<?php
/**
 * Plugin Name: Plugin Learning
 * Description: Capella's first plugin with Composer, Namespace and Autoload.
 * Version: 1.0
 * Author: Eduardo Capella
**/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Include Composer's Autoloader if file exist
$autoload_file = dirname( __FILE__ ) . '/vendor/autoload.php';
if( file_exists( $autoload_file ) ) {
    require_once $autoload_file;
}

// use Cwpl\Includes\Article\Article;
// use Cwpl\Capella;

require_once 'includes/article/Article.php';

// $the_article = new Article();

// if the class exists create a new instance of this class
if ( class_exists( 'Article' ) ) {
    $the_article = new Article();
    // $the_article->cw_cpt_articles();
    
    add_action( 'admin_notices', function() { echo '<h1>Class Article loaded!</h1>'; } );
} else {
    add_action( 'admin_notices', function() { echo "<h1>DOESN'T WORK!</h1>"; } );
}

// register_activation_hook( __FILE__, [ $the_article, 'activate' ] );

// register_deactivation_hook( __FILE__, [ $the_article, 'deactivate' ] );


// function cw_testing_hooks() {
//     echo '<h1>Testing!!!</h1>';
// }
// add_action( 'in_admin_header', __NAMESPACE__ . '\cw_testing_hooks', 1 );



function pluginprefix_deactivate() {
	// Unregister the post type, so the rules are no longer in memory.
	unregister_post_type( 'article' );

	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );




function cwpl_enqueue_scripts() {
    wp_enqueue_script( 'my-js', plugin_dir_url( __FILE__ ) . 'includes/js/script.js', array( 'jquery' ), false );
}
    
add_action( 'wp_enqueue_scripts', 'cwpl_enqueue_scripts' );