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

        $sql = "SELECT u.umeta_id as label_id, u.meta_value as label, p.meta_value as value
                FROM wp_usermeta u
                LEFT JOIN wp_postmeta p on p.meta_value=u.umeta_id and p.post_id=%s
                WHERE u.user_id=%s and u.meta_key='add_favorite_labels_for_user'";

        global $wpdb;
        $result = $wpdb->get_results($wpdb->prepare($sql, $this->post_id, $this->user_id));
        return $result;
    }

}