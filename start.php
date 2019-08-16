<?php
/*
Plugin Name: Plugin-Emrullah
*/
add_action('wp', 'example_function');
add_action('init', 'init_ajax_function');
function example_function()
{
    if (is_user_logged_in() && get_post_type() == "post") {
        function include_add_button($content)
        {
            ob_start();
            include 'inc/page/include_add_favorite_button.php';
            $favorite_content = ob_get_clean();
            $custom_content = $favorite_content;
            $custom_content .= $content;
            return $custom_content;
        }

        add_filter('the_content', 'include_add_button');

        wp_enqueue_style('favorite_style', '/wp-content/plugins/plugin-emrullah/inc/css/favorite.css');

        wp_enqueue_style('bootstrap_style', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        wp_enqueue_script('jquery_script', '//code.jquery.com/jquery-3.4.1.min.js');
        wp_enqueue_script('prefix_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js');
        wp_enqueue_script('prefix_bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');


        wp_enqueue_script('favorite_script', '/wp-content/plugins/plugin-emrullah/inc/js/favorite.js');
        wp_enqueue_script('ajax_script', '/wp-content/plugins/plugin-emrullah/inc/js/get_favorite_liste.js');
    }
}
function init_ajax_function()
{
    include 'inc/page/ajax.php';
}