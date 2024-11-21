<?php
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

