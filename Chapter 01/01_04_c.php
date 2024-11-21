<?php
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

