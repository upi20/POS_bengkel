<?php
$id = $_SESSION['user']['id'];
$data = query("SELECT * FROM tb_user WHERE tb_user.id='$id'");
?>
<div class="container-fluid text-center">
    <center>
        <h3 size="+3" face="arial">Selamat Datang <?= $data[0]['nama']; ?></h3>
    </center>
    <img class="img-fluid" src="images/bg.jpg" alt="">
</div>