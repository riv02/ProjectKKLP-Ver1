<?php
if(isset($_POST['kirim'])){
    $admin = 'teddyknight403@gmail.com';
    
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $message = htmlentities($_POST['message']);

    $headers = 'From: '.$email.' ' . "\r\n" .
               'MIME-Version: 1.0' . "\r\n" .
               'Contact-Type: text/html; charset=utf-8';

    $result = mail($admin, $name, $message, $headers);
    
    if(!$result) {   
       echo "Ada masalah...";// error
      } else {
        echo "Pesan berhasil dikirim...";// correct
      }

    echo '<a href="index.html">Kembali ke halaman</a>';
}
?>
