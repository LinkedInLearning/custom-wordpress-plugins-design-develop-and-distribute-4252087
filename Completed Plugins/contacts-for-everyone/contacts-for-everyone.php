<?php
/**
 * Plugin Name: Contacts for Everyone
 * Description: A simple contact form plugin for beginners.
 * Version: 1.0
 * Author: Your Name
 * Author URI: https://example.com/
 * Text Domain: contacts-for-everyone
 */

 //Exit if accessed directly
 if(!defined('ABSPATH')){
    exit;
 }

 function cfe_enqueue_styles(){
    wp_enqueue_style('cfe-styles', plugin_dir_url(__FILE__) . 'css/contact-form.css');
 }
 add_action('wp_enqueue_scripts', 'cfe_enqueue_styles');

 function cfe_contact_form_shortcode(){
    ob_start();
    include plugin_dir_path(__FILE__) . 'contact-form.php';
    return ob_get_clean();
 }
 add_shortcode('cfe_contact_form', 'cfe_contact_form_shortcode');
