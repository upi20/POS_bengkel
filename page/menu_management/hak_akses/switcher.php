<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hakakses') {
        include "hak_akses.php";
    } else if ($_GET['aksi'] == 'gantiakses') {
        include "gantiakses.php";
    } else {
        include "display.php";
    }
} else {
    include "display.php";
}
