<?php
$name = $_POST['name'];
$visior_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email_form ='98heerthu@gmail.com';

$email_subject ='New Form Submission';

$email_body = "User Name: $name.\n". 
               "User user: $visitor_email.\n". 
               "Subject: $subject.\n". 
               "User Message: $message.\n". ;

$to = '07heerthu@gmail.com';

$headers = "Form: $email_form\r\n";

$headers = "Reply-To: $email_form\r\n";

mail($to,$email_subject,$email_body,$headers);

header("Location: contact.html");


?>