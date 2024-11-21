<?php
function sss_enqueue_assets() {
    wp_enqueue_style('sss-styles', plugin_dir_url(__FILE__) . 'css/social-sharing-styles.css');
    wp_enqueue_script('sss-scripts', plugin_dir_url(__FILE__) . 'js/social-sharing.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'sss_enqueue_assets');