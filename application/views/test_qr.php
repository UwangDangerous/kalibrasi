<?php 


    require "./vendor/autoload.php";
    $qrcode = new QrReader('path/to_image');
    $text = $qrcode->text(); //return decoded text from QR Code

?>