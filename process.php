<?php

    $to = "";
    $from = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $name = $_REQUEST['name'];
    $headers = "From: $from";

    $fields = [
        "name" => "",
        "email" => "",
        "subject" => "",
        "message" => "",
    ];

    $body = "Here is what was sent:\n\n";

    foreach($fields as $a => $b){
        $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]);
    }

    $send = mail($to, $subject, $body, $headers);

?>
