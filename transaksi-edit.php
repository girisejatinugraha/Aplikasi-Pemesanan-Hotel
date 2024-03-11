<?php

$title = 'Edit Transaksi';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Edit Transaksi</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="transaksi-show.php?id=<?= $_GET['id'] ?>" class="button is-light">Lihat</a>
        </div>
        <div class="level-item">
            <a href="transaksi.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_POST['simpan'])) {

    $sql = sprintf("UPDATE transaksi SET kamar = '%s', nm_user = '%s', lama_inap = '%s' WHERE id_transaksi = '%s'", $_POST['kamar'], $_POST['nm_user'], $_POST['lama_inap'], $_POST['id']);

    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:transaksi.php');
    }

    hasMessage('Maaf!, tidak dapat menyimpan data.');

}

if (isset($_GET['id'])) {
    $query = $conn->prepare(sprintf("SELECT * FROM transaksi WHERE id_transaksi = %s", $_GET['id']));
    $query->execute();

    $transaksi = $query->fetch(PDO::FETCH_OBJ);
} else {
    return header('Location:customer.php');
}

?>

<form action="" method="post">

    <input type="hidden" name="id" value="<?= $transaksi->id_transaksi; ?>">

    <div class="field">
        <label for="kamar" class="label">Kamar</label>
        <div class="select">
            <select name="kamar" id="kamar" required>
                <option hidden><?= $transaksi->kamar ?></option>
                <optgroup label="Pilih Kamar">
                    <?php
                    $query = $conn->prepare("SELECT * FROM kamar");
                    $query->execute();

                    while ($item = $query->fetch(PDO::FETCH_OBJ)) {
                    ?>
                        <option><?= $item->kamar ?></option>
                    <?php } ?>
                </optgroup>
            </select>
        </div>
    </div>
    <div class="field">
        <label for="nm_user" class="label">Nama Pelanggan</label>
        <div class="select">
            <select name="nm_user" id="nm_user" required>
                <option hidden><?= $transaksi->nm_user ?></option>
                <optgroup label="Pilih Nama Pelanggan">
                    <?php
                    $query = $conn->prepare("SELECT * FROM user");
                    $query->execute();

                    while ($item = $query->fetch(PDO::FETCH_OBJ)) {
                    ?>
                        <option><?= $item->nama ?></option>
                    <?php } ?>
                </optgroup>
            </select>
        </div>
    </div>
    <div class="field">
        <label for="lama_inap" class="label">Lama Inap</label>
        <div class="control">
            <input type="number" name="lama_inap" id="lama_inap" class="input" value="<?= $transaksi->lama_inap; ?>" placeholder="tulis dengan angka (harian)" required>
        </div>
    </div>
    <div class="field">
        <button name="simpan" class="button is-success">Perbarui</button>
    </div>
</form>

<?php

require_once "template/theFooter.php"

?>