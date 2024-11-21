<?php
// Shortcode to display the social sharing buttons
function sss_share_buttons_shortcode() {
    // Get the current post/page URL and title
    $post_url = get_permalink();
    $post_title = get_the_title();

    ob_start(); ?>
    <div class="sss-share-bar">
        <!-- Facebook Copy Button -->
        <button class="sss-button sss-facebook" data-message="A Facebook Status Worth Checking Out: <?php echo $post_title; ?> <?php echo $post_url; ?>">Share to Facebook Audience</button>
        
        <!-- X (Twitter) Copy Button -->
        <button class="sss-button sss-x" data-message="Retweet if you agree!: <?php echo $post_title; ?> <?php echo $post_url; ?>">Share to X Audience</button>
        
        <!-- LinkedIn Copy Button -->
        <button class="sss-button sss-linkedin" data-message="Career advice from a pro: <?php echo $post_title; ?> <?php echo $post_url; ?>">Share to LinkedIn Audience</button>
    </div>
    <?php return ob_get_clean();
}
add_shortcode('sss_share_buttons', 'sss_share_buttons_shortcode');
