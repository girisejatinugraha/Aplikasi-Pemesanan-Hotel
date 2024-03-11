<?php

$title = 'Lihat Pelanggan';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Lihat Pelanggan</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="customer-edit.php?id=<?= $_GET['id'] ?>" class="button is-light">Edit</a>
        </div>
        <div class="level-item">
            <a href="customer.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['id'])) {
    $query = $conn->prepare(sprintf("SELECT * FROM user WHERE id_user = %s", $_GET['id']));
    $query->execute();

    $item = $query->fetch(PDO::FETCH_OBJ);
} else {
    return header('Location:customer.php');
}

?>

<div class="field">
    <label class="label">Nama Pelanggan</label>
    <pre><?= $item->nama; ?></pre>
</div>

<?php

require_once "template/theFooter.php"

?>