<?php
function show_random_image() {
    $images = array_map( function($image) {
      return basename($image);
    }, glob(__DIR__ . '/images/*.jpg') );
    $index = rand(0, count($images) - 1);
    $image_url = get_template_directory_uri() . '/images/' . $images[$index];
    // $image_alt = basename($images[$index], 'jpg');
    echo "<img src=\"$image_url\" alt=\"$image_url\" />";
}

function has_WPML() {
    return function_exists('icl_object_id');
}

function my_footer_languages_list(){
    $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0&orderby=code' );
    if( !empty( $languages ) ){
        echo '<div id="footer_language_list"><ul>';
        foreach( $languages as $l ){
            echo '<li>';
            if( $l['country_flag_url'] ){
                if( !$l['active'] ) echo '<a href="'.$l['url'].'">';
                echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                if( !$l['active'] ) echo '</a>';
            }
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo apply_filters( 'wpml_display_language_names', NULL, $l['native_name'], $l['translated_name'] );
            if( !$l['active'] ) echo '</a>';
            echo '</li>';
        }
        echo '</ul></div>';
    }
}

require 'class-materialize-theme.php';
$materializeTheme = new bhubr\MaterializeTheme;

// add_action( 'after_setup_theme', 'register_my_menu' );
// function register_my_menu() {
//   register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
// }