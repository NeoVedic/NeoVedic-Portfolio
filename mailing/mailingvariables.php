<?php
    // Use environment variables for sensitive data
    $mail_host = getenv('SMTP_HOST') ?: "smtp.gmail.com";
    $mail_port = getenv('SMTP_PORT') ?: "587";
    $mail_sender_email = getenv('SMTP_EMAIL') ?: "";
    $mail_sender_password = getenv('SMTP_PASSWORD') ?: "";
    $mail_sender_name = getenv('SMTP_SENDER_NAME') ?: "Website Form";
?>
