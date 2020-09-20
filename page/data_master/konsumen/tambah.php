<?php
if (isset($_POST['simpan'])) {
    $kode_konsumen = $_POST['kode_konsumen'];
    $nik           = $_POST['nik'];
    $nama          = $_POST['nama'];
    $no_telepon    = $_POST['no_telepon'];
    $merk_mobil    = $_POST['merk_mobil'];
    $warna_mobil   = $_POST['warna_mobil'];
    $tgl_daftar    = $_POST['tgl_daftar'];
    $alamat        = $_POST['alamat'];

    $querybuilder = "INSERT INTO `tb_konsumen` 
    (`id_konsumen`, `kode_konsumen`, `nik`, `nama`, `no_telepon`, `merk_mobil`, `warna_mobil`, `tanggal_daftar`, `alamat`) 
    VALUES 
    (NULL, '$kode_konsumen', '$nik', '$nama', '$no_telepon', '$merk_mobil ', '$warna_mobil', '$tgl_daftar', '$alamat')";

    $sql = $koneksi->query($querybuilder);
    if ($sql) {
        setAlert('Berhasil..! ', 'Data berhasil ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    } else {
        setAlert('Gagal..! ', 'Data gagal ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
}
?>


<script type="text/javascript">
    function validasi(form) {
        if (form.nik.value == "") {
            setAlert("Peringatan..!", "NIK Tidak Boleh Kosong", "danger");
            form.nik.focus();
            return false;
        } else if (form.nama.value == "") {
            setAlert("Peringatan..!", "Nama Tidak Boleh Kosong", "danger");
            form.nama.focus();
            return false;
        } else if (form.no_telepon.value == "") {
            setAlert("Peringatan..!", "No Telepon Tidak Boleh Kosong", "danger");
            form.no_telepon.focus();
            return false;
        } else if (form.merk_mobil.value == "") {
            setAlert("Peringatan..!", "Merek Mobil Tidak Boleh Kosong", "danger");
            form.merk_mobil.focus();
            return false;
        } else if (form.warna_mobil.value == "") {
            setAlert("Peringatan..!", "Warna Mobil Tidak Boleh Kosong", "danger");
            form.warna_mobil.focus();
            return false;
        } else if (form.tgl_daftar.value == "") {
            setAlert("Peringatan..!", "Tanggal Daftar Tidak Boleh Kosong", "danger");
            form.tgl_daftar.focus();
            return false;
        } else if (form.alamat.value == "") {
            setAlert("Peringatan..!", "Alamat Tidak Boleh Kosong", "danger");
            form.alamat.focus();
            return false;
        }
        return (true);
    }
</script>