<?php

//scripts

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    //parent
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
   //child
    wp_enqueue_style( 'child', get_stylesheet_directory_uri() . '/assets/css/custom.css', array( $parenthandle ), $theme->get('Version'), 'all');
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/custom.js', array ( 'jquery' ), $theme->get('Version'), true);
}



