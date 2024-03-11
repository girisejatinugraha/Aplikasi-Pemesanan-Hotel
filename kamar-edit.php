<?php

$title = 'Edit Kamar';

require_once "template/theHeader.php";

midAuth();


?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Edit Kamar</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="kamar-show.php?id=<?= $_GET['id'] ?>" class="button is-light">Lihat</a>
        </div>
        <div class="level-item">
            <a href="kamar.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_POST['simpan'])) {
    $sql = sprintf("UPDATE kamar SET kamar = '%s', harga = '%s', deskripsi = '%s' WHERE id_kamar = %s", $_POST['kamar'], $_POST['harga'], $_POST['deskripsi'], $_POST['id']);

    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:kamar.php');
    }

    hasMessage('Maaf!, tidak dapat menyimpan data.');

}

if (isset($_GET['id'])) {
    $query = $conn->prepare(sprintf("SELECT * FROM kamar WHERE id_kamar = %s", $_GET['id']));
    $query->execute();

    $item = $query->fetch(PDO::FETCH_OBJ);
} else {
    return header('Location:kamar.php');
}

?>

<form action="" method="post">

    <input type="hidden" name="id" value="<?= $item->id_kamar; ?>">

    <div class="field">
        <label for="kamar" class="label">Nama Kamar</label>
        <div class="control">
            <input type="text" name="kamar" id="kamar" class="input" value="<?= $item->kamar; ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="harga" class="label">Harga</label>
        <div class="control">
            <input type="number" name="harga" id="harga" class="input" value="<?= $item->harga; ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="deskripsi" class="label">Deskripsi</label>
        <div class="control">
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="textarea" required><?= $item->deskripsi; ?></textarea>
        </div>
    </div>
    <div class="field">
        <button name="simpan" class="button is-success">Perbarui</button>
    </div>
</form>

<?php

require_once "template/theFooter.php"

?>