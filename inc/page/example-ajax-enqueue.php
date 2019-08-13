<?php
/**
 * Created by PhpStorm.
 * User: emrullahtastan
 * Date: 2019-08-13
 * Time: 21:43
 */


function example_ajax_enqueue() {

    // Enqueue javascript on the frontend.
    wp_enqueue_script(
        'example-ajax-script',
        '/wp-content/plugins/plugin-emrullah/inc/js/simple-ajax-example.js'
    );
    // The wp_localize_script allows us to output the ajax_url path for our script to use.

}
add_action( 'wp_enqueue_scripts', 'example_ajax_enqueue' );

