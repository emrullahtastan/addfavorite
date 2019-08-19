<?php
add_action('wp_ajax_select_label_for_user', 'select_label_for_user');
add_action('wp_ajax_nopriv_select_label_for_user', 'select_label_for_user');


function select_label_for_user()
{
    $result = false;
    if (isset($_REQUEST['label_id']) && isset($_REQUEST['value'])) {

        $label_id = $_REQUEST['label_id'];
        $value = $_REQUEST['value'];
        if (!is_numeric($label_id)) {
            $result = false;
            echo json_encode($result);
            die();
        }


        require_once ADD_FAVORITE_PLUGIN_PATH . "/inc/class/SelectLabelForUser.class.php";
        $select_cl = new SelectLabelForUser();
        $select_cl->selected = $value;
        $select_cl->label_id = $label_id;
        $select_cl->post_id = url_to_postid(wp_get_referer());
        $result = $select_cl->select_label();
    }
    echo json_encode($result);
    die();
}
