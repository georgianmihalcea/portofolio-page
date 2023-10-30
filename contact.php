<?php
include("./config.php");
include("./includes/functions.php");
include('./includes/PHPMailer/src/Exception.php');
include('./includes/PHPMailer/src/PHPMailer.php');
include('./includes/PHPMailer/src/SMTP.php');
if(isset($_POST['contact'])){

	$message = "
	Hello,<br /><br />
	You have a new message from:".$_POST['name']."<br /><br />
	Email address to reply:".$_POST['email']."<br /><br />
	Message:<br /><br />
	".$_POST['text']."<br /><br />
	";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <'.$_POST['email'] .'>' . "\r\n";
	if(mail("contact@georgianmihalcea.com","New Message from your site, sender: ".$_POST['name'],$message,$headers)){
		echo 1;
	}else{
		echo 0;
	}
}