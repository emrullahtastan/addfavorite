<?php
/**
 * Created by PhpStorm.
 * User: emrullah
 * Date: 17.08.2019
 * Time: 23:54
 */

class CreateLabelForUser
{
    public $label;
    public $user_id;
    private $user_meta_key = "add_favorite_labels_for_user";

    public function create_label()
    {
        if (!is_numeric($this->user_id) || empty($this->label))
            return false;

        $result = false;
        $label_id = add_user_meta($this->user_id, $this->user_meta_key, $this->label);
        if ($label_id) {
            require_once ADD_FAVORITE_PLUGIN_PATH . "/inc/class/SelectLabelForUser.class.php";
            $select_cl = new SelectLabelForUser();
            $select_cl->selected = true;
            $select_cl->label_id = $label_id;
            $select_cl->post_id = url_to_postid(wp_get_referer());
            $result = $select_cl->select_label();
        }
        return $result;
    }

}