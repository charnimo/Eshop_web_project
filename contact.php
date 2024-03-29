

<?php

// WORK IN PROGRESS

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Email subject
    $subject = 'New Message from Contact Form';
    
    // Email body
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    
    // Email headers
    $headers = "From: $name <$email>";
    
    // Your email address
    $to = 'jeffbanarie123@gmail.com';
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo '<p>Your message has been sent successfully!</p>';
    } else {
        echo '<p>There was a problem sending your message. Please try again later.</p>';
    }
}
?>
