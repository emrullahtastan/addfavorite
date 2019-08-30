<?php
/*
Plugin Name: Add Favorite
*/
add_action('wp', 'example_function');
add_action('init', 'init_ajax_function');
function example_function()
{
    if (is_user_logged_in() && get_post_type() == "post") {
        include 'inc/page/include_add_favorite_button.php';
        include 'inc/page/include_styles.php';
        include 'inc/page/include_javascripts.php';
    }
}

function init_ajax_function()
{
    include 'inc/page/ajax.php';
}

if ( ! defined( 'ADD_FAVORITE_PLUGIN_PATH' ) ) {
    define( 'ADD_FAVORITE_PLUGIN_PATH', ABSPATH . 'wp-content/plugins/plugin-emrullah/' );
}
