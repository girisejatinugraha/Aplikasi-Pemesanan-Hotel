<?php

$title = 'Semua Transaksi';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Semua Transaksi</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="transaksi-create.php" class="button is-light">Tambah</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['hapus'])) {
    $sql = sprintf("DELETE FROM transaksi WHERE id_transaksi = %s", $_GET['hapus']);
    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:transaksi.php');
    } else {
        $message = 'Maaf!, Tidak bisa menghapus data tersebut.';
    }
}

hasMessage();

?>

<div class="table-container">
    <table class="table is-fullwidth is-bordered is-striped is-hoverable is-narrow has-text-centered">
        <thead>
            <tr>
                <th>#</th>
                <th>Kamar</th>
                <th>Nama Pelanggan</th>
                <th>Lama Inap</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM transaksi ORDER BY id_transaksi DESC";

            $query = $conn->prepare($sql);

            $query->execute();

            while ($item = $query->fetch(PDO::FETCH_OBJ)) {

            ?>
                <tr>
                    <td><?= $item->id_transaksi; ?></td>
                    <td><?= $item->kamar; ?></td>
                    <td><?= $item->nm_user; ?></td>
                    <td><?= $item->lama_inap; ?></td>
                    <td><?= $item->tgl_transaksi; ?></td>
                    <td>
                        <a href="transaksi-show.php?id=<?= $item->id_transaksi; ?>" class="button is-small is-rounded is-outlined is-primary">
                            Lihat
                        </a>
                        <a href="transaksi-edit.php?id=<?= $item->id_transaksi; ?>" class="button is-small is-rounded is-outlined is-info">
                            Ubah
                        </a>
                        <a href="?hapus=<?= $item->id_transaksi; ?>" class="button is-small is-rounded is-outlined is-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?');">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php

require_once "template/theFooter.php"

?>