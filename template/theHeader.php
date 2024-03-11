<?php

require_once __DIR__ . "/../config/config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Pemesanan Hotel' ?></title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css' integrity='sha512-byErQdWdTqREz6DLAA9pCnLbdoGGhXfU6gm1c8bkf7F51JVmUBlayGe2A31VpXWQP+eiJ3ilTAZHCR3vmMyybA==' crossorigin='anonymous' />
</head>

<body>
    <nav class="navbar has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php" class="navbar-item">Pesanan Hotel</a>

                <a class="navbar-burger" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div class="navbar-menu" id="navbarBasicExample">
                <div class="navbar-end">
                    <?php if (isAuth()) { ?>
                        <a href="kamar.php" class="navbar-item is-tab">Kamar</a>
                        <a href="customer.php" class="navbar-item is-tab">Customer</a>
                        <a href="transaksi.php" class="navbar-item is-tab">Transaksi</a>
                        <a href="laporan.php" class="navbar-item is-tab">Laporan</a>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link"><?= $_SESSION['auth_name'] ?></a>

                            <div class="navbar-dropdown">
                                <a href="logout.php" class="navbar-item" onclick="return confirm('Apakah Anda yakin ingin keluar aplikasi?');">
                                    Keluar
                                </a>
                            </div>
                        </div>
                        <?php } else { ?>
                        <a href="login.php" class="navbar-item is-tab">Masuk</a>
                        <a href="register.php" class="navbar-item is-tab">Daftar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <section class="section">
        <div class="container">