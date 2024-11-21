<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize form fields
    $first_name = sanitize_text_field($_POST['cfe-first-name']);
    $last_name = sanitize_text_field($_POST['cfe-last-name']);
    $email = sanitize_email($_POST['cfe-email']);
    $phone = sanitize_text_field($_POST['cfe-phone']);
    $message = sanitize_textarea_field($_POST['cfe-message']);

// Send the email if all required fields are filled
if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($message)) {
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission';
    $body = "You have received a new message from $first_name $last_name.<br><br>";
    $body .= "<strong>Email:</strong> $email<br>";
    $body .= "<strong>Phone:</strong> $phone<br>";
    $body .= "<strong>Message:</strong><br>$message<br>";
    $headers = array(
        'Content-Type: text/html; charset=UTF-8'
    );

    wp_mail($to, $subject, $body, $headers);
    echo '<p class="cfe-success-message">Thank you for reaching out. We will get back to you soon!</p>';
} else {
    echo '<p class="cfe-error-message">All required fields must be filled out. Please try again.</p>';
}
}
?>