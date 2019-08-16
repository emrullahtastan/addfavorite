<?php
function include_add_button($content)
{
    ob_start();
    include 'add_favorite_button_html.php';
    $favorite_content = ob_get_clean();
    $custom_content = $favorite_content;
    $custom_content .= $content;
    return $custom_content;
}

add_filter('the_content', 'include_add_button');
