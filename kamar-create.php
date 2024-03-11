<?php

$title = 'Tambah Kamar';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Tambah Kamar</h1>
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
    $sql = sprintf("INSERT INTO kamar(kamar, harga, deskripsi) VALUES ('%s', '%s', '%s')", $_POST['kamar'], $_POST['harga'], $_POST['deskripsi']);

    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:kamar.php');
    }

    hasMessage('Maaf!, tidak dapat menyimpan data.');

}

?>

<form action="" method="post">
    <div class="field">
        <label for="kamar" class="label">Nama Kamar</label>
        <div class="control">
            <input type="text" name="kamar" id="kamar" class="input" required>
        </div>
    </div>
    <div class="field">
        <label for="harga" class="label">Harga</label>
        <div class="control">
            <input type="number" name="harga" id="harga" class="input" required>
        </div>
    </div>
    <div class="field">
        <label for="deskripsi" class="label">Deskripsi</label>
        <div class="control">
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="textarea" required></textarea>
        </div>
    </div>
    <div class="field">
        <button name="simpan" class="button is-success">Simpan</button>
    </div>
</form>

<?php

require_once "template/theFooter.php"

?>