<?php

$title = 'Semua Pelanggan';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Semua Pelanggan</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="customer-create.php" class="button is-light">Tambah</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['hapus'])) {
    $sql = sprintf("DELETE FROM user WHERE id_user = %s", $_GET['hapus']);
    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:customer.php');
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
                <th>Nama Pelanggan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM user";

            $query = $conn->prepare($sql);

            $query->execute();

            while ($item = $query->fetch(PDO::FETCH_OBJ)) {

            ?>
                <tr>
                    <td><?= $item->id_user; ?></td>
                    <td><?= $item->nama; ?></td>
                    <td>
                        <a href="customer-show.php?id=<?= $item->id_user; ?>" class="button is-small is-rounded is-outlined is-primary">
                            Lihat
                        </a>
                        <a href="customer-edit.php?id=<?= $item->id_user; ?>" class="button is-small is-rounded is-outlined is-info">
                            Ubah
                        </a>
                        <a href="?hapus=<?= $item->id_user; ?>" class="button is-small is-rounded is-outlined is-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?');">
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