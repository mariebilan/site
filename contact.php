<?php

$post = (!empty($_POST)) ? true : false;

if($post)
{
$email = trim($_POST['email']);
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);
$tel = htmlspecialchars($_POST["tel"]);
$error = '';

if(!$name)
{
$error .= 'Please enter your name<br />';
}

// Phone valide?
function ValidateTel($valueTel)
{
$regexTel = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
if($valueTel == "") {
return false;
} else {
$string = preg_replace($regexTel, "", $valueTel);
}
return empty($string) ? true : false;
}
if(!$email)
{
$error .= "Please enter your email address<br />";
}
if($email && !ValidateTel($email))
{
$error .= "Please enter your valid email address<br />";
}
if(!$error)

// (length)
if(!$message || strlen($message) < 1)
{
$error .= "Please enter your message<br />";
}
if(!$error)
{


$name_tema = "=?utf-8?b?". base64_encode($name) ."?=";

$subject ="New notification from the site https://mariebilan.github.io/todo-app/site";
$subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";
/*
$message ="\n\nMessage: ".$message."\n\nName: " .$name."\n\nPhone: ".$tel."\n\n";
*/
$message1 ="\n\nName: ".$name."\n\nPhone: " .$tel."\n\nE-mail: " .$email."\n\nMessage: ".$message."\n\n";	


$header = "Content-Type: text/plain; charset=utf-8\n";

$header .= "From: New notification <marie.bilan.cg@gmail.com>\n\n";	
$mail = mail("marie.bilan.cg@gmail.com", $subject1, iconv ('utf-8', 'windows-1251', $message1), iconv ('utf-8', 'windows-1251', $header));

if($mail)
{
echo 'OK';
}

}
else
{
echo '<div class="notification_error">'.$error.'</div>';
}

}
?>