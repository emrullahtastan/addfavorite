<?php
wp_enqueue_script('jquery_script', '//code.jquery.com/jquery-3.4.1.min.js');
wp_enqueue_script('prefix_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js');
wp_enqueue_script('prefix_bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');


wp_enqueue_script('favorite_script', '/wp-content/plugins/add-favorite/inc/js/favorite.js');
wp_enqueue_script('get_labels_for_user_script', '/wp-content/plugins/add-favorite/inc/js/ajax_functions/get_labels_for_user.js');
wp_enqueue_script('create_label_for_user_script', '/wp-content/plugins/add-favorite/inc/js/ajax_functions/create_label_for_user.js');
wp_enqueue_script('select_label_for_user_script', '/wp-content/plugins/add-favorite/inc/js/ajax_functions/select_label_for_user.js');
wp_enqueue_script('select_favorite_label_script', '/wp-content/plugins/add-favorite/inc/js/select_favorite_label.js');