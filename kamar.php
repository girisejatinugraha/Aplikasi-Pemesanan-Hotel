<?php

$title = 'Semua Kamar';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Semua Kamar</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="kamar-create.php" class="button is-light">Tambah</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['hapus'])) {
    $sql = sprintf("DELETE FROM kamar WHERE id_kamar = %s", $_GET['hapus']);
    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:kamar.php');
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
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM kamar";

            $query = $conn->prepare($sql);

            $query->execute();

            while ($item = $query->fetch(PDO::FETCH_OBJ)) {

            ?>
                <tr>
                    <td><?= $item->id_kamar; ?></td>
                    <td><?= $item->kamar; ?></td>
                    <td><?= money($item->harga); ?></td>
                    <td><?= $item->deskripsi; ?></td>
                    <td>
                        <a href="kamar-show.php?id=<?= $item->id_kamar; ?>" class="button is-small is-rounded is-outlined is-primary">
                            Lihat
                        </a>
                        <a href="kamar-edit.php?id=<?= $item->id_kamar; ?>" class="button is-small is-rounded is-outlined is-info">
                            Ubah
                        </a>
                        <a href="?hapus=<?= $item->id_kamar; ?>" class="button is-small is-rounded is-outlined is-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?');">
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