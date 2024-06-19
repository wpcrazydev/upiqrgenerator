<?php
require 'vendor/autoload.php';
use chillerlan\QRCode\QRCode;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $amount = $_POST['amount'];
    $upi = $_POST['upi'];

    $data = 'upi://pay?pa=' . $upi . '&cu=INR&am=' . $amount . '';

} else {
    echo "Method not allowed.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Qr</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 25%;
            border: 1px solid gray;
            border-radius: 10px;
            padding: 15px;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                border: 1px solid gray;
                border-radius: 10px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="container">
            <h5 class="text-center">Download or Share Qr To Recieve Payment</h5>
            <div class="qr">
                <?= '<img id="qrCodeImage" style="width:100%;" src="' . (new QRCode)->render($data) . '" alt="QR Code" />'; ?>
            </div>
            <button id="downloadBtn" class="btn btn-dark w-100 mb-3">Download Qr</button>
            <button id="shareBtn" class="btn btn-primary w-100">Share Qr</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        document.getElementById('downloadBtn').addEventListener('click', function () {
            var svgData = document.getElementById('qrCodeImage').src;

            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var img = new Image();

            img.onload = function () {
                var desiredWidth = 500; // Desired width in pixels
                var desiredHeight = 500; // Desired height in pixels

                canvas.width = desiredWidth;
                canvas.height = desiredHeight;
                ctx.drawImage(img, 0, 0, desiredWidth, desiredHeight);

                // Create a temporary link element
                var tempLink = document.createElement('a');
                tempLink.href = canvas.toDataURL('image/png');
                tempLink.download = 'qr_code.png';
                tempLink.click();
            };

            img.src = svgData;
        });
    </script> -->

    <script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            var svgData = document.getElementById('qrCodeImage').src;

            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var img = new Image();

            img.onload = function() {
                var desiredWidth = 500; // Desired width in pixels
                var desiredHeight = 500; // Desired height in pixels

                canvas.width = desiredWidth;
                canvas.height = desiredHeight;
                ctx.drawImage(img, 0, 0, desiredWidth, desiredHeight);

                // Create a temporary link element
                var tempLink = document.createElement('a');
                tempLink.href = canvas.toDataURL('image/png');
                tempLink.download = 'qr_code.png';
                tempLink.click();
            };

            img.src = svgData;
        });

        document.getElementById('shareBtn').addEventListener('click', function() {
            var svgData = document.getElementById('qrCodeImage').src;

            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var img = new Image();

            img.onload = function() {
                var desiredWidth = 500; // Desired width in pixels
                var desiredHeight = 500; // Desired height in pixels

                canvas.width = desiredWidth;
                canvas.height = desiredHeight;
                ctx.drawImage(img, 0, 0, desiredWidth, desiredHeight);

                canvas.toBlob(function(blob) {
                    var file = new File([blob], 'qr_code.png', { type: 'image/png' });

                    if (navigator.canShare && navigator.canShare({ files: [file] })) {
                        navigator.share({
                            files: [file],
                            title: 'QR Code',
                            text: 'Scan this QR code to make a payment.',
                        })
                        .then(() => console.log('Share successful'))
                        .catch(error => console.error('Share failed:', error));
                    } else {
                        alert('Sharing not supported on this browser/device.');
                    }
                }, 'image/png');
            };

            img.src = svgData;
        });
    </script>
</body>

</html>