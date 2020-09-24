<?php
$number = 0;
$data = query("SELECT * FROM tb_barang_kategori ORDER BY id_barang_kategori DESC");
?>
<h3>Lapora Semua Kategori</h3>
<table style="margin:auto; width: 90%">
    <thead>
        <tr>
            <th width="20px">No</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td><?php echo ++$number; ?></td>
                <td><?php echo $d['barang_kategori_nama']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>