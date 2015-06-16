<?php
// Check for empty fields
if(empty($_POST['name']) ||
   empty($_POST['email']) ||
   empty($_POST['phone']) ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
	echo "Bad request!!!";
	return false;
}
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message

// Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$to = 'chkorg1@ch0k1.org';

// This is the mail subject
$email_subject = 'Website Contact Form: ' .$name;

// This is the mail body
$email_body = 'You have received a new message from your website contact form.' ."\n\n";
$email_body .= 'Here are the details:' ."\n\n";
$email_body .= 'Name: '. $name ."\n\n";
$email_body .= 'Email: '. $email_address ."\n\n";
$email_body .= 'Phone: '. $phone ."\n\n";
$email_body .= 'Message: '. "\n" . $message ."\n\n";

$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=UTF-8";
$headers[] = "From: noreply@ch0k1.org";
$headers[] = "Reply-To: {$email_address}";
$headers[] = "Subject: {$email_subject}";
$headers[] = "X-Mailer: PHP/".phpversion();

mail($to,$email_subject,$email_body,$headers);
?>