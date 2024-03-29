

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = 'New Message from Contact Form';
    
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $name <$email>";
    
    $to = 'ahmed25072003@gmail.com';
    
    // eeuuh lezm smtp server i'm not doing allat
    if (mail($to, $subject, $body, $headers)) {
        echo '<p>sent</p>';
    } else {
        echo '<p>erreur</p>';
    }
}
?>
