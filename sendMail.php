<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form fields
    $name = htmlspecialchars($_POST['name'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Receiver Email
    $to = "shashanksharma962727@gmail.com"; 

    // Email subject and body
    $mail_subject = "New Contact Form Submission: " . $subject;
    $body = "
    <h2>New Contact Message</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Message:</strong><br>$message</p>
    ";

    // Email headers
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $name <$email>" . "\r\n";

    // Send Email
    if (mail($to, $mail_subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='Contact.html';</script>";
    } else {
        echo "<script>alert('Message could not be sent. Try again later.'); window.location.href='Contact.html';</script>";
    }
}
?>