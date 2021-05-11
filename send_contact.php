<?php

$currentRequestMethod = $_SERVER['REQUEST_METHOD'];

$allowedRequestMethods = array('POST', 'HEAD');

if(!in_array($currentRequestMethod, $allowedRequestMethods)){
    header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
    exit;
}

if($_POST['kirim']){
	$admin = 'teddyknight403@gmail.com';

	$name = "";
    $email = "";    
    $message = "";
     
    if(isset($_POST['name'])) {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

	if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    }
         
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    if(mail($admin, $name, $message, $headers)) {
        echo "<p>Thank you for contacting us, $name. You will get a reply within 24 hours.</p>";
		echo '<a href="index.html">Kembali ke halaman</a>';
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
		echo '<a href="index.html">Kembali ke halaman</a>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
?>
