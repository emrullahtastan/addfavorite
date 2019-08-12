
<?php
/*
Plugin Name: Plugin-Emrullah
*/

function include_add_button($content)
{

    //$custom_content = "<button id='add_favorite_button' class='btn btn-default add_favorite'>Add Favorite</button>";
    //$custom_content = include 'inc/page/include_add_favorite_button.php';
    $custom_content = "<div class=\"btn-group\">
  <button type=\"button\" class=\"btn btn-danger dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    Action
  </button>
  <div class=\"dropdown-menu\">
    <a class=\"dropdown-item\" href=\"#\">Action</a>
    <a class=\"dropdown-item\" href=\"#\">Another action</a>
    <a class=\"dropdown-item\" href=\"#\">Something else here</a>
    <div class=\"dropdown-divider\"></div>
    <a class=\"dropdown-item\" href=\"#\">Separated link</a>
  </div>
</div>";
    $custom_content .= $content;
    return $custom_content;
}

add_filter('the_content', 'include_add_button');


wp_enqueue_style('favorite_style2', '/wp-content/plugins/plugin-emrullah/inc/bootstrap/test.css');
wp_enqueue_style('favorite_style', '/wp-content/plugins/plugin-emrullah/inc/css/favorite.css');
wp_enqueue_style('bootstrap_style', '/wp-content/plugins/plugin-emrullah/inc/css/favorite.css');

wp_enqueue_script('jquery_script', '//code.jquery.com/jquery-3.4.1.min.js');
wp_enqueue_script('prefix_bootstrap2', '/wp-content/plugins/plugin-emrullah/inc/bootstrap/dist/js/bootstrap.bundle.js');
wp_enqueue_script('prefix_bootstrap', '/wp-content/plugins/plugin-emrullah/inc/bootstrap/dist/js/bootstrap.js');
wp_enqueue_script('favorite_script', '/wp-content/plugins/plugin-emrullah/inc/js/favorite.js');



