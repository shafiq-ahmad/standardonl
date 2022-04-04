<?php
defined('_MEXEC') or die ('Restricted Access');

require_once(LIB_PATH . "/phpMailer/class.phpmailer.php");
require_once(LIB_PATH . "/phpMailer/class.pop3.php");
require_once(LIB_PATH . "/phpMailer/class.smtp.php");
	

	//$mail = new PHPMailer();
	
function sendEmail($to, $msg){
	$mail = new PHPMailer(true); 
	$settings=getSettings();
	$email=$settings[0]['e_mail'];
	$password=$settings[0]['password'];
	$to_name = "Franchise notification";
	$subject = "A Client Registration Received at ".strftime("%T", time());
	$message = "<html><head><title>{$subject}</title></head><body>{$msg}</body></html>";
	//$message = wordwrap($message,70);
	$fAdmin = "Admin {$email}";
	$from_name = $fAdmin;
	$from = $email;
	//$mail->IsSMTP();      
	$mail->Host     = "mail.standardonlinejob.com";
	$mail->Port     = 26;
	$mail->SMTPAuth = true;
	//$mail->Username = "vistaonl";
	$mail->Username = $email;
	$mail->Password = $password;

	try {
	$mail->AddReplyTo($email, 'No - Reply');
	$mail->AddAddress($to, 'Franchise');
	$mail->SetFrom($email, $from_name);
	$mail->AddReplyTo($email, 'Do not reply');
	$mail->Subject = $subject;
	$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
	//$mail->MsgHTML(file_get_contents('index.htm'));
	//$mail->AddAttachment('images/phpmailer.gif');      // attachment
	//$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment

	$mail->MsgHTML($message);
	$mail->IsHTML(true); // send as HTML
	$mail->Send();
	$message = '<span class="message">Message Sent OK</span>';
	Session::setMessages($message );
	return true;
	} catch (phpmailerException $e) {
	$message = '<span class="message">' . $e->errorMessage() .  '</span>'; //Pretty error messages from PHPMailer
	Session::setMessages($message );
	return false;
	} catch (Exception $e) {
	$message = '<span class="message">' . $e->getMessage() .  '</span>'; //Boring error messages from anything else!
	Session::setMessages($message );
	return false;	
	}
		
}

?>