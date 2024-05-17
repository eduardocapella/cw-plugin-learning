<?php
/**
 * Plugin Name: Plugin Learning
 * Description: Capella's first plugin with Composer, Namespace and Autoload.
 * Version: 1.0
 * Author: Eduardo Capella
**/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    // Include Composer's autoloader
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';

    // echo dirname( __FILE__ ) . '/vendor/autoload.php';
    // echo "<script>console.log( 'Carregou!!' );</script>";
}

use Cwpl\Includes\Article\Article;
// use Cwpl\Capella;

// $capella = new Article();

require_once 'Includes/Article/Article.php';

define( 'WP_USE_THEMES', false );
// if the class exists create a new instance of this class
if ( class_exists( 'Article' ) ) {
    // $the_article = new Article();
    // print_r( $the_article );
    echo "<h1>Class Article loaded!</h1>";
} else {
    echo "<h1>DOESN'T WORK!</h1>";
}

// register_activation_hook( __FILE__, [ $the_article, 'activate' ] );

// register_deactivation_hook( __FILE__, [ $the_article, 'deactivate' ] );





// function cw_testing_hooks() {
//     echo '<h1>Testing!!!</h1>';
// }
// add_action( 'in_admin_header', __NAMESPACE__ . '\cw_testing_hooks', 1 );