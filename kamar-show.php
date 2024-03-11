<?php

$title = 'Lihat Kamar';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Lihat Kamar</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="kamar-edit.php?id=<?= $_GET['id'] ?>" class="button is-light">Edit</a>
        </div>
        <div class="level-item">
            <a href="kamar.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['id'])) {
    $query = $conn->prepare(sprintf("SELECT * FROM kamar WHERE id_kamar = %s", $_GET['id']));
    $query->execute();

    $item = $query->fetch(PDO::FETCH_OBJ);
} else {
    return header('Location:kamar.php');
}

?>

<div class="field">
    <label class="label">Nama Kamar</label>
    <pre><?= $item->kamar; ?></pre>
</div>
<div class="field">
    <label class="label">Harga</label>
    <pre><?= $item->harga; ?></pre>
</div>
<div class="field">
    <label class="label">Deskripsi</label>
    <pre><?= $item->deskripsi; ?></pre>
</div>

<?php

require_once "template/theFooter.php"

?>