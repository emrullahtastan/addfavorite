<?php


add_action('wp_ajax_create_label_for_user', 'create_label_for_user');
add_action('wp_ajax_nopriv_create_label_for_user', 'create_label_for_user');


function create_label_for_user()
{
    $result = false;
    if (isset($_REQUEST['label'])) {
        require_once ADD_FAVORITE_PLUGIN_PATH . '/inc/class/CreateLabelForUser.class.php';
        $create_cl = new CreateLabelForUser();
        $create_cl->label = $_REQUEST['label'];
        $create_cl->user_id=get_current_user_id();
        $result=$create_cl->create_label();
    }
    echo json_encode($result);
    die();
}


