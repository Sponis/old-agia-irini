<?php
$contact_name = $_POST['name'];
$contact_email = $_POST['email'];
$contact_subject = $_POST['subject'];
$contact_message = $_POST['message'];
$charset = 'UTF-8';
$encoded_name = "=?$charset?B?".base64_encode($contact_name)."?=\r\n";
$encoded_subject = "=?$charset?B?".base64_encode($contact_subject)."?=\r\n";
$encoded_message = "=?$charset?B?".base64_encode($contact_message)."?=\r\n";

if( $contact_name == true )
{
	$sender = $contact_email;
	$receiver = "info@agia-irini.gr";
	$client_ip = $_SERVER['REMOTE_ADDR'];
	$email_body = "Ονοματεπώνυμο: \n$contact_name \n\nEmail: \n$sender \n\nΛόγος επικοινωνίας: \n$contact_subject \n\nΤο μήνυμα: \n$contact_message \n\n\n\nΗ IP του αποστολέα: $client_ip";		
	$extra = "From: ".$sender."\r\n"."Content-Type: text/plain; charset=$charset; format=flowed\r\n"."MIME-Version: 1.0\r\n"."Content-Transfer-Encoding: 8bit\r\n"."X-Mailer: PHP\r\n";

	if( mail( $receiver, "Φόρμα Επικοινωνίας του δικτυακού τόπου www.agia-irini.gr - $encoded_subject", $email_body, $extra ) ) 
	{
		echo "success=yes";
	}
	else
	{
		echo "success=no";
	}
}
?>