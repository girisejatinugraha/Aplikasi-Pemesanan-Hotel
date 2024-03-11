<?php

require_once "template/theHeader.php";

midAuth();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .content {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            background-color: #4b8ef1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .title {
            font-size: 3em;
            margin-bottom: 10px;
            color: #ecf0f1;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            font-size: 1.5em;
            margin-top: 0;
            color: #ecf0f1;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 class="title">Selamat Datang di  Pemesanan Hotel</h1>
        <h2 class="subtitle">Nikmati layanan kami hingga Anda pulang kembali</h2>
    </div>
</body>
</html>

<?php

require_once "template/theFooter.php"

?>