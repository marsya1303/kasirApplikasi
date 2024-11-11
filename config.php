<?php
$koneksi = mysqli_connect("localhost", "root", "", "kasir2");
// $koneksi=mysqli_connect("localhost:3306","root","root");
$db = mysqli_select_db($koneksi, "kasir2");
date_default_timezone_set('Asia/Jakarta');
?>