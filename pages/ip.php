<?php
    
    include 'phpqrcode/qrlib.php';
    $hostName = gethostname();
    $localIP = gethostbyname($hostName);
    $ip = "http://$localIP/shababi_caffee_web";
    $qrImagePath = 'qrcode.png';

    QRcode::png($ip, $qrImagePath);
