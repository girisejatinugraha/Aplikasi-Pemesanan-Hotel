<?php

$title = 'Edit Pelanggan';

require_once "template/theHeader.php";

midAuth();


?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Edit Pelanggan</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="customer-show.php?id=<?= $_GET['id'] ?>" class="button is-light">Lihat</a>
        </div>
        <div class="level-item">
            <a href="customer.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_POST['simpan'])) {
    $sql = sprintf("UPDATE user SET nama = '%s' WHERE id_user = %s", $_POST['nama'], $_POST['id']);

    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:customer.php');
    }

    hasMessage('Maaf!, tidak dapat menyimpan data.');

}

if (isset($_GET['id'])) {
    $query = $conn->prepare(sprintf("SELECT * FROM user WHERE id_user = %s", $_GET['id']));
    $query->execute();

    $item = $query->fetch(PDO::FETCH_OBJ);
} else {
    return header('Location:customer.php');
}

?>

<form action="" method="post">

    <input type="hidden" name="id" value="<?= $item->id_user; ?>">

    <div class="field">
        <label for="nama" class="label">Nama Pelanggan</label>
        <div class="control">
            <input type="text" name="nama" id="nama" class="input" value="<?= old('nama', $item->nama); ?>" required>
        </div>
    </div>
    <div class="field">
        <button name="simpan" class="button is-success">Perbarui</button>
    </div>
</form>

<?php

require_once "template/theFooter.php"

?>