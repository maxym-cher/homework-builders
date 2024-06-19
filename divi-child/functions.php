<?php

function starter_theme_enqueue_styles() {

    $parent_style = 'divi-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'global', get_stylesheet_directory_uri() . '/assets/js/global.js', [ 'jquery' ], filemtime( get_stylesheet_directory() . '/assets/js/global.js' ), true );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'starter_theme_enqueue_styles' );
add_filter('use_block_editor_for_post_type', '__return_false');

function my_custom_divi_modules() {
    include_once( get_stylesheet_directory() . '/includes/modules/CustomSlider/custom-slider-module.php' );
}
add_action( 'et_builder_ready', 'my_custom_divi_modules' );