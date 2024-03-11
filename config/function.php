<?php

function hasMessage($message = '')
{
    if (!empty($message)) {
        echo '<article class="message is-warning">
                <div class="message-body">
                    '. $message .'
                </div>
            </article>';
    }
}

/**
 * Akan mengkonversi nilai rupiah
 */
function money($number)
{
    return 'Rp' . number_format($number, 2, ',', '.');
}

/**
 * Memungkin data lama bisa ditempilkan kembali
 */
function old($var, $val = '')
{
    return $_POST[$var] ?? $val;
}

/**
 * Untuk mengecek pengguna sudah masuk
 */
function midAuth()
{
    if (!isset($_SESSION['auth_user'])) {
        header('Location:frontend.php');
    }
}

/**
 * Pengguna belum masuk
 */
function midGuest()
{
    if (isset($_SESSION['auth_user'])) {
        header('Location:index.php');
    }
}

/**
 * Mengecek pengguna sudah masuk atau belum
 * 
 * @return Boolean
 */
function isAuth()
{
    return isset($_SESSION['auth_user']);
}