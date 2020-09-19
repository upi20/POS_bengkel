<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'tambah') {
        include "tambah.php";
    } else if ($_GET['aksi'] == 'ubah') {
        include "ubah.php";
    } else if ($_GET['aksi'] == 'hapus') {
        include "hapus.php";
    } else if ($_GET['aksi'] == 'hakakses') {
        include "hak_akses.php";
    } else if ($_GET['aksi'] == 'gantiakses') {
        include "gantiakses.php";
    } else {
        include "display.php";
    }
} else {
    include "display.php";
}
