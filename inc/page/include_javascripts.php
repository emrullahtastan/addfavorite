<?php
wp_enqueue_script('jquery_script', '//code.jquery.com/jquery-3.4.1.min.js');
wp_enqueue_script('prefix_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js');
wp_enqueue_script('prefix_bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');


wp_enqueue_script('favorite_script', '/wp-content/plugins/plugin-emrullah/inc/js/favorite.js');
wp_enqueue_script('ajax_script', '/wp-content/plugins/plugin-emrullah/inc/js/get_favorite_liste.js');
wp_enqueue_script('get_labels_for_user_script',
    '/wp-content/plugins/plugin-emrullah/inc/js/ajax_functions/get_labels_for_user');