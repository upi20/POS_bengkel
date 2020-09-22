<?php
// Databaase
// ===========================================================
$koneksi = mysqli_connect("localhost", "root", "", "db_pos_bengkel");
// ===========================================================

// tools ======================================================
// Judul halaman
$tools['page_title'] = "PT. Agung Automall Jambi";

// jangan dirubah <------
$temp['page']['title'] = false;
// --------------------->

// mode Ubah dan Delete Manajemen user
$tools['developer'] = true;
//  ===========================================================

// mengecek apakah ada data get atau tidak
if (isset($_GET['page'])) $page = $_GET['page'];
else $page = "";

if (isset($_GET['submenu'])) $submenu = $_GET['submenu'];
else $submenu = "";

// mendefinisikan base url
$_baseurl = '?page=' . $page . '&submenu=' . $submenu;
