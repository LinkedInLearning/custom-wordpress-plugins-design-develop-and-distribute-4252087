<?php
/**
 * Plugin Name: Our Project Vault
 * Description: A plugin for managing project timelines, statuses, important details in one place.
 * Version: 1.0
 * Author: Your Name
 */

 //Exit if accessed directly
if(!defined('ABSPATH')){
    exit;
}

// Register custom post type for Project Management
function opv_register_project_cpt() {
    $labels = array(
        'name'                  => _x('Projects', 'Post type general name', 'our-project-vault'),
        'singular_name'         => _x('Project', 'Post type singular name', 'our-project-vault'),
        'menu_name'             => _x('Our Project Vault', 'Admin Menu text', 'our-project-vault'),
        'name_admin_bar'        => _x('Project', 'Add New on Toolbar', 'our-project-vault'),
        'add_new'               => __('Add New Project', 'our-project-vault'),
        'add_new_item'          => __('Add New Project', 'our-project-vault'),
        'new_item'              => __('New Project', 'our-project-vault'),
        'edit_item'             => __('Edit Project', 'our-project-vault'),
        'view_item'             => __('View Project', 'our-project-vault'),
        'all_items'             => __('All Projects', 'our-project-vault'),
        'search_items'          => __('Search Projects', 'our-project-vault'),
        'not_found'             => __('No projects found.', 'our-project-vault'),
        'not_found_in_trash'    => __('No projects found in Trash.', 'our-project-vault'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'custom-fields'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'rewrite'            => array('slug' => 'projects'),
    );

    register_post_type('project', $args);
}
add_action('init', 'opv_register_project_cpt');

// Add custom meta boxes for additional project details
function opv_add_project_meta_boxes() {
    add_meta_box(
        'opv_project_details', // Unique id
        __('Project Details', 'our-project-vault'), // Title
        'opv_render_project_meta_box', // Callback function
        'project', // Post type
        'normal', // Context
        'default' // Priority
    );
}
add_action('add_meta_boxes', 'opv_add_project_meta_boxes');

function opv_render_project_meta_box($post) {
    // Retrieve current meta values
    $project_start_date = get_post_meta($post->ID, '_opv_project_start_date', true);
    $project_end_date = get_post_meta($post->ID, '_opv_project_end_date', true);
    $project_status = get_post_meta($post->ID, '_opv_project_status', true);

    ?>
    <label for="opv_project_start_date"><?php _e('Start Date', 'our-project-vault'); ?>:</label>
    <input type="date" id="opv_project_start_date" name="opv_project_start_date" value="<?php echo esc_attr($project_start_date); ?>" style="width: 100%; margin-bottom: 10px;" />
    
    <label for="opv_project_end_date"><?php _e('End Date', 'our-project-vault'); ?>:</label>
    <input type="date" id="opv_project_end_date" name="opv_project_end_date" value="<?php echo esc_attr($project_end_date); ?>" style="width: 100%; margin-bottom: 10px;" />
    
    <label for="opv_project_status"><?php _e('Project Status', 'our-project-vault'); ?>:</label>
    <select id="opv_project_status" name="opv_project_status" style="width: 100%; margin-bottom: 10px;">
        <option value="not_started" <?php selected($project_status, 'not_started'); ?>><?php _e('Not Yet Started', 'our-project-vault'); ?></option>
        <option value="in_progress" <?php selected($project_status, 'in_progress'); ?>><?php _e('In Progress', 'our-project-vault'); ?></option>
        <option value="complete" <?php selected($project_status, 'complete'); ?>><?php _e('Complete', 'our-project-vault'); ?></option>
    </select>
    <?php
}

// Save custom meta box data
function opv_save_project_meta_box_data($post_id) {
    if (array_key_exists('opv_project_start_date', $_POST)) {
        update_post_meta(
            $post_id,
            '_opv_project_start_date',
            sanitize_text_field($_POST['opv_project_start_date'])
        );
    }
    
    if (array_key_exists('opv_project_end_date', $_POST)) {
        update_post_meta(
            $post_id,
            '_opv_project_end_date',
            sanitize_text_field($_POST['opv_project_end_date'])
        );
    }
    
    if (array_key_exists('opv_project_status', $_POST)) {
        update_post_meta(
            $post_id,
            '_opv_project_status',
            sanitize_text_field($_POST['opv_project_status'])
        );
    }
}
add_action('save_post', 'opv_save_project_meta_box_data');

// Display project details on the front end
function opv_display_project_details($content) {
    if (is_singular('project')) {
        global $post;
        
        $project_start_date = get_post_meta($post->ID, '_opv_project_start_date', true);
        $project_end_date = get_post_meta($post->ID, '_opv_project_end_date', true);
        $project_status = get_post_meta($post->ID, '_opv_project_status', true);

        $status_labels = array(
            'not_started' => __('Not Yet Started', 'our-project-vault'),
            'in_progress' => __('In Progress', 'our-project-vault'),
            'complete' => __('Complete', 'our-project-vault'),
        );

        $custom_content = "<div class='opv-project-details'>";
        $custom_content .= "<p><strong>Start Date:</strong> " . esc_html($project_start_date) . "</p>";
        $custom_content .= "<p><strong>End Date:</strong> " . esc_html($project_end_date) . "</p>";
        $custom_content .= "<p><strong>Status:</strong> " . esc_html($status_labels[$project_status]) . "</p>";
        $custom_content .= "</div>";

        $content .= $custom_content;
    }
    return $content;
}
add_filter('the_content', 'opv_display_project_details');

function opv_enqueue_styles(){
    wp_enqueue_style('project-styles', plugin_dir_url(__FILE__) . 'css/project-styles.css');
}
add_action('wp_enqueue_scripts', 'opv_enqueue_styles');






