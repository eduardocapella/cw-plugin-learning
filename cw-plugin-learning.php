<?php
/**
 * Plugin Name: Plugin Learning
 * Description: Capella's first plugin with Composer, Namespace and Autoload.
 * Version: 1.0
 * Author: Eduardo Capella
**/

namespace CWPL;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Include Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';


function cw_testing_hooks() {
    echo '<h1>Testing!!!</h1>';
}
add_action( 'in_admin_header', __NAMESPACE__ . '\cw_testing_hooks', 1 );


// $articles = new Article();

require_once __DIR__ . '/includes/cpts/Article.php';
// if the class exists create a new instance of this class
if ( class_exists( 'CWPL\CPTs\Article\Article' ) ) {
    $the_article = new Article();
} else {
    echo "<h1>DOESN'T WORK!</h1>";
}

register_activation_hook( __FILE__, [ $the_article, 'activate' ] );

register_deactivation_hook( __FILE__, [ $the_article, 'deactivate' ] );
