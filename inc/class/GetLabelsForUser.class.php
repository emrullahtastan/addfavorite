<?php
/**
 * Created by PhpStorm.
 * User: emrullah
 * Date: 18.08.2019
 * Time: 01:01
 */

class GetLabelsForUser
{
    public $user_id;
    public $post_id;

    public function get_labels_for_user()
    {
        if (!is_numeric($this->user_id) || !is_numeric($this->post_id))
            return false;
        $sql = "SELECT u.umeta_id as label_id, u.meta_value as label
                FROM wp_postmeta p
                LEFT JOIN wp_usermeta u on u.umeta_id=p.meta_value and u.user_id=%s
                WHERE p.post_id=%s and p.meta_key='add_favorite_post_label_id'";
        global $wpdb;
        $result = $wpdb->get_results($wpdb->prepare($sql, 1, 46));
        return $result;
    }

}