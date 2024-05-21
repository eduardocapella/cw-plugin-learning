<?php

namespace Cwpl\Classes;
use Cwpl;

class Plugin {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'cwpl_enqueue_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'cwpl_enqueue_styles' ) );
    }

    public function cwpl_enqueue_scripts() {
        wp_enqueue_script( 'cwpl-js', Cwpl\JSURL . '/script.js', array( 'jquery' ), Cwpl\VERSION, 'true' );
    }
    // add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\cwpl_enqueue_scripts' );
    
    public function cwpl_enqueue_styles() {
        wp_enqueue_style( 'cwpl-css', Cwpl\CSSURL . '/style.css', array(), Cwpl\VERSION );
    }
    // add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\cwpl_enqueue_styles' );
    
}