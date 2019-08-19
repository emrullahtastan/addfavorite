<?php
/**
 * Created by PhpStorm.
 * User: emrullah
 * Date: 17.08.2019
 * Time: 23:56
 */

class SelectLabelForUser
{
    public $post_id;
    public $label_id;
    private $post_meta_key = "add_favorite_post_label_id";
    public $selected;

    public function select_label()
    {
        if (!is_numeric($this->post_id) || !is_numeric($this->label_id) || empty($this->selected))
            return false;

        if ($this->selected=="true") {
            $result = add_post_meta($this->post_id, $this->post_meta_key, $this->label_id);
        } else if ($this->selected=="false") {
            $result = $this->unselect_label();
        }
        return $result;
    }

    private function unselect_label()
    {
        return delete_post_meta($this->post_id, $this->post_meta_key, $this->label_id);
    }

}