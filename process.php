<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Set recipient email address
    $to = "alexboscan4@gmail.com"; // Change this to your email address

    // Set subject
    $subject = "Message from $name";

    // Compose HTML message
    $email_message = "
    <html>
    <head>
        <title>Contact Form Submission</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 5px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                color: #333333;
            }
            p {
                color: #666666;
            }
            .details {
                margin-top: 20px;
            }
            .details p {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>Contact Form Submission</h2>
            <div class='details'>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Message:</strong> $message</p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Set additional headers for better email deliverability
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $name <$to>\r\nReply-To: $name <$to>\r\n";
    $headers .= "DKIM-Signature: v=1; a=rsa-sha256; d=ridami.ro; s=mail; c=relaxed/relaxed;\r\n";
    $headers .= "SPF: pass\r\n";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        // Email sent successfully, redirect back to previous page
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Failed to send email. Please try again later.";
    }
}
?>