<?php

$title = 'Lihat Laporan';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Lihat Laporan</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="laporan-edit.php?id=<?= $_GET['id'] ?>" class="button is-light">Edit</a>
        </div>
        <div class="level-item">
            <a href="laporan.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['id'])) {
    $query = $conn->prepare(sprintf("SELECT * FROM transaksi WHERE id_transaksi = %s", $_GET['id']));
    $query->execute();

    $item = $query->fetch(PDO::FETCH_OBJ);

    if (!$item) {
        return header('Location: laporan.php');
    }

    $sqlKamar = sprintf("SELECT * FROM kamar WHERE kamar = '%s'", $item->kamar);
    $queryKamar = $conn->prepare($sqlKamar);
    $queryKamar->execute();

    $itemKamar = $queryKamar->fetch(PDO::FETCH_OBJ);

    $harga = $itemKamar->harga;
    $subtotal = $harga * $item->lama_inap;
} else {
    return header('Location: laporan.php');
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
    <label class="label">Harga</label>
    <pre><?= money($harga); ?></pre>
</div>

<div class="field">
    <label class="label">Total Bayar</label>
    <pre><?= money($subtotal); ?></pre>
</div>

<div class="field">
    <label class="label">Tanggal Transaksi</label>
    <pre><?= $item->tgl_transaksi; ?></pre>
</div>

<?php

require_once "template/theFooter.php"

?>