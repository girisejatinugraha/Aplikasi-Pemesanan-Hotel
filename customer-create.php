<?php

$title = 'Tambah Pelanggan';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Tambah Pelanggan</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="kamar.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_POST['simpan'])) {
    $sql = sprintf("INSERT INTO user(nama) VALUES ('%s')", $_POST['nama']);

    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:customer.php');
    }

    hasMessage('Maaf!, tidak dapat menyimpan data.');
}

?>

<form action="" method="post">
    <div class="field">
        <label for="nama" class="label">Nama Pelanggan</label>
        <div class="control">
            <input type="text" name="nama" id="nama" class="input" required>
        </div>
    </div>
    <div class="field">
        <button name="simpan" class="button is-success">Simpan</button>
    </div>
</form>

<?php

require_once "template/theFooter.php"

?>