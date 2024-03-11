<?php

$title = 'Semua Laporan';

require_once "template/theHeader.php";

midAuth();

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Semua Laporan</h1>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['hapus'])) {
    $sql = sprintf("DELETE FROM transaksi WHERE id_transaksi = %s", $_GET['hapus']);
    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:laporan.php');
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
                <th>Harga</th>
                <th>Total Bayar</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
                <th>Lainnya</th>
            </tr>
        </thead>
        <tbody
            <?php

            $sql = "SELECT * FROM transaksi";

            $query = $conn->prepare($sql);

            $query->execute();

            $total = 0;

            while ($item = $query->fetch(PDO::FETCH_OBJ)) {
                $sqlKamar = sprintf("SELECT * FROM kamar WHERE kamar = '%s'", $item->kamar);

                $queryKamar = $conn->prepare($sqlKamar);
                $queryKamar->execute();

                $itemKamar = $queryKamar->fetch(PDO::FETCH_OBJ);

                $harga = $itemKamar->harga;

                $subtotal = $harga * $item->lama_inap;

                $total += $subtotal;

            ?>
                <tr>
                    <td><?= $item->id_transaksi; ?></td>
                    <td><?= $item->kamar; ?></td>
                    <td><?= $item->nm_user; ?></td>
                    <td><?= $item->lama_inap; ?></td>
                    <td><?= money($harga); ?></td>
                    <td><?= money($subtotal); ?></td>
                    <td><?= $item->tgl_transaksi; ?></td>
                    <td>
                        <a href="laporan-show.php?id=<?= $item->id_transaksi; ?>" class="button is-small is-rounded is-outlined is-primary">
                            Lihat
                        </a>
                        <a href="?hapus=<?= $item->id_transaksi; ?>" class="button is-small is-rounded is-outlined is-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?');">
                            Hapus
                        </a>
                    </td>
                    <td>
                        <a href="export-excel.php?id=<?= $item->id_transaksi; ?>" class="button is-small is-success is-outlined is-primary"> 
                            Export Excel
                        </a>
                        <a href="javascript:void(0);" onclick="window.print();" class="button is-small is-success is-outlined is-warning">
                            Print
                        </a>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="5">Total Pendapatan</td>
                <td colspan="2"><?= money($total) ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="table-container">
    <table class="table is-fullwidth is-bordered is-striped is-hoverable is-narrow is-primary mt-5">
        <thead>
            <tr>
                <th colspan="2">Informasi Tambahan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tanggal</td>
                <td><?= date('d F Y') ?></td>
            </tr>
            <tr>
                <td>Operator</td>
                <td>Giri Sejati Nugraha</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>

<?php

require_once "template/theFooter.php"


?>