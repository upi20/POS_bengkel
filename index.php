<?php
// error_reporting(0);
session_start();
// var_dump($_SESSION);
// die;
include "function.php";
if (!ceklogin($_SESSION['user'])) header('Location: login.php');

// mengecek apakah ada data get atau tidak
if (isset($_GET['page'])) $page = $_GET['page'];
else $page = "";

if (isset($_GET['submenu'])) $submenu = $_GET['submenu'];
else $submenu = "";

// mendefinisikan base url
$_baseurl = '?page=' . $page . '&submenu=' . $submenu;


// Mengambil data untuk menu navigasi
$level        = $_SESSION['user']['level'];
$display_page = "home.php";
$menus        = query("SELECT * FROM tb_user_access_menu 
        INNER JOIN tb_user_menu 
        ON    tb_user_access_menu.menu_id       = tb_user_menu.user_menu_id
        WHERE tb_user_access_menu.id_user_level = '$level'
");

if ($menus) {
    for ($i = 0; $i < count($menus); $i++) {
        $id = $menus[$i]['menu_id'];

        // Mengambil data untuk sub menu
        $menus[$i]['sub_menu'] = query("SELECT * FROM tb_user_access_sub_menu 
            INNER JOIN tb_user_sub_menu 
            ON    tb_user_access_sub_menu.sub_menu_id   = tb_user_sub_menu.id
            WHERE tb_user_access_sub_menu.id_user_level = '$level'
            AND tb_user_sub_menu.menu_id='$id'
        ");

        // Mempersiapkan navigasi active dan display
        $menus[$i]['active'] = false;
        if ($menus[$i]['sub_menu']) {
            for ($j = 0; $j < count($menus[$i]['sub_menu']); $j++) {

                // menggabungkan url menu dan sub menu supaya bisa di akses
                $menus[$i]['sub_menu'][$j]['url_act'] = "?page=" . $menus[$i]['menu_url'] . "&submenu=" . $menus[$i]['sub_menu'][$j]['sub_menu_url'];

                // mencari menu dan sub menu navigasi active
                if ($menus[$i]['menu_url'] . "|" . $menus[$i]['sub_menu'][$j]['sub_menu_url'] == ($page .  "|" . $submenu)) {
                    $display_page                 = $menus[$i]['sub_menu'][$j]['file'];
                    $menus[$i]['sub_menu'][$j]['active'] = true;
                    $menus[$i]['active']                 = true;
                } else {
                    $menus[$i]['sub_menu'][$j]['active'] = false;
                }
            }
            $menus[$i]['visible'] = true;
        } else {
            $menus[$i]['visible'] = false;
            $menus[$i]['active'] = false;
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PT. Agung Automall Jambi</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <style>
        .navbar-bg {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px;
            background-color: dimgrey;
            width: 260px;
        }

        .navbar-merek {
            color: #fff;
            font-size: 18px;
            font-weight: 600;
        }

        .navbar-merek:hover {
            text-decoration: none;
            color: #fff;
        }
    </style>
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-bg text-tengah">
                    <a class="navbar-merek" href="index.php">PT. Agung Automall Jambi</a>
                </div>
            </div>
            <div style="color: white;
                padding  : 15px 50px 5px 50px;
                float    : right;
                font-size: 16px;"><?php echo date('d-M-Y'); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <?php if ($page === "") : ?>
                            <a href="index.php" class="bg-primary"><i class="fa fa-dashboard fa-2x"></i> Beranda</a>
                        <?php else : ?>
                            <a href="index.php"><i class="fa fa-dashboard fa-2x"></i> Beranda</a>
                        <?php endif; ?>
                    </li>

                    <?php if ($menus) {
                        foreach ($menus as $menu) {
                            if ($menu['visible']) {
                                echo '<li>';

                                // tag buaka ul
                                if ($menu['active']) {
                                    echo '
                                <a  href  = "#" class                                        = "bg-primary"><i class = "' . $menu["icon"] . '"></i> ' . $menu["menu_title"] . '<span class = "fa arrow"></span></a>
                                <ul class = "nav nav-second-level collapse in" aria-expanded = "true" style          = "">
                                ';
                                } else {
                                    echo '
                                <a  href  = "#"><i class = "' . $menu["icon"] . '"></i> ' . $menu["menu_title"] . '<span class = "fa arrow"></span></a>
                                <ul class = "nav nav-second-level">
                                ';
                                }

                                // daftar sub menu
                                if ($menu['sub_menu']) {
                                    foreach ($menu['sub_menu'] as $nav_submenu) {
                                        if ($nav_submenu['active']) echo '<li><a href="' . $nav_submenu['url_act'] . '" class="bg-primary"></i> ' . $nav_submenu['title'] . '</a></li>';
                                        else  echo '<li><a href="' . $nav_submenu['url_act'] . '"></i> ' . $nav_submenu['title'] . '</a></li>';
                                    }
                                }

                                // tag tutup ul
                                echo '</ul>';
                                echo '</li>';
                            }
                        }
                    } ?>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if ($_SESSION['alert']['show']) getAlert(); ?>
                        </div>
                        <?php
                        if (file_exists($display_page)) include $display_page;
                        else include "page/error.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-inverse navbar-fixed-bottom footer-bottom">
        <div class="container text-center">
            <p class="text-center" style="color: #D1C4E9;"><small>Copyright @ 2020 PT. Agung Automall Jambi</p>
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->

        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
                $('.alert').alert();
            });
        </script>
        <script src="assets/js/custom.js"></script>
</body>

</html>