<?php
function terlambat($tgl_dateline, $tgl_kembali)
{

	$tgl_dateline_pcs = explode("-", $tgl_dateline);
	$tgl_dateline_pcs = $tgl_dateline_pcs[2] . "-" . $tgl_dateline_pcs[1] . "-" . $tgl_dateline_pcs[0];
	$tgl_kembali_pcs  = explode("-", $tgl_kembali);
	$tgl_kembali_pcs  = $tgl_kembali_pcs[2] . "-" . $tgl_kembali_pcs[1] . "-" . $tgl_kembali_pcs[0];
	$selisih          = strtotime($tgl_kembali_pcs) - strtotime($tgl_dateline_pcs);
	$selisih          = $selisih / 86400;

	if ($selisih >= 1) {
		$hasil_tgl = floor($selisih);
	} else {
		$hasil_tgl = 0;
	}
	return $hasil_tgl;
}

function setAlert($title = "", $conte = "", $color = "primary")
{
	$_SESSION['alert']['title'] = $title;
	$_SESSION['alert']['color'] = $color;
	$_SESSION['alert']['conte'] = $conte;
	$_SESSION['alert']['show'] = true;
}

function getAlert()
{
	$alert_color = $_SESSION['alert']['color'];
	$alert_title = $_SESSION['alert']['title'];
	$alert_conte = $_SESSION['alert']['conte'];

	echo 'setAlert("' . $alert_title . '", "' . $alert_conte . '", "' . $alert_color . '")';
	$_SESSION['alert']['show'] = false;
}
