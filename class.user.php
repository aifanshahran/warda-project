<?php

require_once 'db.php';

class USER
{	

	private $conn;
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	
	function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug = 0; 
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = "ssl"; 
		$mail->Host = "smtp.gmail.com"; 
		$mail->Port = 465; 
		$mail->AddAddress($email);
		$mail->Username="noreply.chicrush@gmail.com"; 
		$mail->Password="uthm12345"; 
		$mail->SetFrom('noreply.chicrush@gmail.com', 'no-reply.chicrush');
		$mail->AddReplyTo("noreply.chicrush@gmail.com","no-reply.chicrush");
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}	
}