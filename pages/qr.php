<?php
    include 'phpqrcode/qrlib.php';

    $hostName = gethostname();
    $localIP = gethostbyname($hostName);
    $ip = "http://$localIP/shababi_caffee_web";
    $qrImagePath = 'qrcode.png';

    QRcode::png($ip, $qrImagePath);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/qr.css">
    <title>QR</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-container">
            <div class="form-inner">
                <div class="title"><h1>Your IP Is:</h1></div>
                <?php echo $ip; ?>
                <div class="qr">
                    <img src="<?php echo $qrImagePath; ?>" alt="QR Code" width="250px">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
