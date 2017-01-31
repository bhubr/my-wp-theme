<?php

function enqueue_my_style() {
    wp_enqueue_style('main', get_template_directory_uri() . '/style.css?ts=' . time());
}
add_action('wp_enqueue_scripts', 'enqueue_my_style');

function show_random_image() {
    $images = array_map( function($image) {
      return basename($image);
    }, glob(__DIR__ . '/images/*.jpg') );
    $index = rand(0, count($images) - 1);
    $image_url = get_template_directory_uri() . '/images/' . $images[$index];
    // $image_alt = basename($images[$index], 'jpg');
    echo "<img src=\"$image_url\" alt=\"$image_url\" />";
}

// add_action( 'after_setup_theme', 'register_my_menu' );
// function register_my_menu() {
//   register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
// }