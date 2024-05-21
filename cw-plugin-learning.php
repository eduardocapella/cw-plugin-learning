<?php
/**
 * Plugin Name: Plugin Learning
 * Description: Capella's first plugin with Composer, Namespace and Autoload.
 * Version: 1.0
 * Author: Eduardo Capella
**/

namespace Cwpl;
// usar o Namespace e não uma classe específica
// na hora de criar a instância da classe, aí sim utilizar o namespace/nomeDaClasse
// use Cwpl\Classes;
// Usar o use apenas para Namespaces completamente diferentes. O use navega por subpastas, então não preciso adicionar "subNamespaces"
// podemos utilizar um alias para o Namespace. Exemplo:
// use Cwpl\Classes as CL;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Criar constantes para a versão do plugin, a URL dos arquivos de CSS e a URL dos arquivos de JS
define ( __NAMESPACE__ . '\VERSION', '1.0.0' );
define ( __NAMESPACE__ . '\CSSURL', plugin_dir_url( __FILE__ ) . '/includes/css' );
define ( __NAMESPACE__ . '\JSURL', plugin_dir_url( __FILE__ ) . '/includes/js' );

// Include Composer's Autoloader if file exist
$autoload_file = dirname( __FILE__ ) . '/vendor/autoload.php';
if( file_exists( $autoload_file ) ) {
    require_once $autoload_file;
}

// se não criar uma instância da Classe, a Classe não existirá
$the_plugin = new Classes\Plugin();
$the_article = new Classes\Article();


// if the class exists create a new instance of this class
if ( class_exists( __NAMESPACE__ . '\Classes\Article' ) ) {
    // $the_article = new Article();
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



// Prestar atenção no add_action
// como essa função foi declarada dentro de um Namespace, devemos chamar a função utilizando o Namespace no qual ela está encapsulada

// function cwpl_enqueue_scripts() {
//     wp_enqueue_script( 'cwpl-js', plugin_dir_url( __FILE__ ) . 'includes/js/script.js', array( 'jquery' ), '1.0.0', false );
// }
// add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\cwpl_enqueue_scripts' );


// function cwpl_enqueue_styles() {
//     wp_enqueue_style( 'cwpl-css', plugin_dir_url( __FILE__ ) . 'includes/css/style.css', '1.0.0', false );
// }
// add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\cwpl_enqueue_styles' );