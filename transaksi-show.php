<?php

$title = 'Lihat Transaksi';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Lihat Transaksi</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="transaksi-edit.php?id=<?= $_GET['id'] ?>" class="button is-light">Edit</a>
        </div>
        <div class="level-item">
            <a href="transaksi.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['id'])) {
    $query = $conn->prepare(sprintf("SELECT * FROM transaksi WHERE id_transaksi = %s", $_GET['id']));
    $query->execute();

    $item = $query->fetch(PDO::FETCH_OBJ);
} else {
    return header('Location:transaksi.php');
}

?>

<div class="field">
    <label class="label">Kamar</label>
    <pre><?= $item->kamar; ?></pre>
</div>

<div class="field">
    <label class="label">Nama Pelanggan</label>
    <pre><?= $item->nm_user; ?></pre>
</div>

<div class="field">
    <label class="label">Lama Inap</label>
    <pre><?= $item->lama_inap; ?></pre>
</div>

<div class="field">
    <label class="label">Tanggal Transaksi</label>
    <pre><?= $item->tgl_transaksi; ?></pre>
</div>

<?php

require_once "template/theFooter.php"

?>