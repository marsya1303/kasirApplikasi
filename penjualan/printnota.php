<style>
	@page {
		size: 60mm 105mm;
		margin-left: auto;
margin-right: auto;

}
</style>
<?php
session_start();
if (isset($_GET['penid'])) {
	$penid = $_GET['penid'];
	$kbl = $_GET['kbl'];
	include "../config.php";
	$sqlpenjualan = "select * from penjualan where penjualan_id='$penid'";
	$respenjualan = mysqli_query($koneksi, $sqlpenjualan);
	$dtpenjualan = mysqli_fetch_array($respenjualan);
	$tgl = $dtpenjualan['tanggal'];
	$bayar = $dtpenjualan['bayar'];
	$nbayar = number_format($bayar, 0, ",", ".");
	$id_pelanggan = $dtpenjualan['id_pelanggan'];
	if (!$id_pelanggan) {
		$npel = 'Umum';
	} else {
		$sqlpelanggan = "select * from pelanggan where id_pelanggan='$id_pelanggan'";
		$respelanggan = mysqli_query($koneksi, $sqlpelanggan);
		$dtpelanggan = mysqli_fetch_array($respelanggan);
		$npel = $dtpelanggan['nama_pelanggan'];
	}
	$id_petugas = $dtpenjualan['id_petugas'];
	$sqlpetugas = "select * from petugas where id_petugas='$id_petugas'";
	$respetugas = mysqli_query($koneksi, $sqlpetugas);
	$dtpetugas = mysqli_fetch_array($respetugas);
	$npet = $dtpetugas['nama_petugas'];
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Daftar Pembayaran</title>
		<!-- <link rel="stylesheet" type="text/css" href="../style.css"> -->
		<link rel="stylesheet" href="print.css?time=<?= md5(time()) ?>">
	</head>

	<body class="struk" onload="printOut()">
		<section class="sheet">
			<center>
				<br>
				<h2 style="margin:0px">SKAPATISSERIE</h2>
				Jl. Siliwangi No. 30 Kadipaten Majalengka<br>
				Telp. 088222333001 <br>
			</center>
			<?php echo str_repeat("=", 37) ?>
			<table width="100%" cellspacing="0">
				<tr>
					<td style="padding:2px 5px;">Tgl : <?= $tgl ?></td>
				</tr>
				<tr>
					<td style="padding:2px 5px;">Penjualan ID : <?= $penid ?></td>
				</tr>
				<tr>
					<td style="padding:2px 5px;">Pelanggan : <?= $npel ?></td>
				</tr>
				<tr>
					<td style="padding:2px 5px;">Kasir : <?= $npet ?></td>
				</tr>
			</table>
			<?php echo str_repeat("-", 37) ?>
			<table width="100%" cellspacing="0">
			
					<table class="item-list" width="100%">
        <tr>
            <th style="text-align : left !important">Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
		<?php
			$id = $_GET['penid'];
			$sql1 = "SELECT * FROM  penjualan WHERE penjualan_id=$id";
$query1 = mysqli_query($koneksi, $sql1);
$data = mysqli_fetch_array($query1);
        $totalbayar = 0;
        $sql = "SELECT detail_penjualan.*, produk.nama_produk FROM detail_penjualan LEFT JOIN produk ON detail_penjualan.kode_produk=produk.kode_produk WHERE penjualan_id = $id" ;
        
        $query = mysqli_query($koneksi, $sql);
        while ($d = mysqli_fetch_array($query)){
?>
<tr>
    <td style="text-align : left !important"><?= $d['nama_produk']?>
    </td>
    <td><?= $d['jumlah']?></td>
    <td><?= $d['harga']?></td>
    <td><?= $d['harga'] * $d['jumlah']?></td>
    <?php
    $totalbayar +=$d['harga'] * $d['jumlah'];
    ?>
</tr>
<?php
        } 
        ?>
			</table>
			<table width="100%" cellspacing="0">
				<tr>
					<td colspan="3">
						<?= str_repeat("-", 36) ?>
					</td>
				</tr>
				<tr>
					<td align="right" style="padding:5px 5px;">Total :</td>
					<th align="right" style="font-size:10pt; padding:2px 5px;"><?= $totalbayar ?></th>
				</tr>
				<tr>
					<td align="right" style="padding:5px 5px;">Bayar :</td>
					<td align="right" style="padding:5px 5px;"><?php echo $data[3] ?></td>
				</tr>
				<tr>
					<td align="right" style="padding:5px 5px;">Kembali :</td>
					<td align="right" style="padding:5px 5px;"><?php echo $data[3]-$totalbayar ?></td>
				</tr>
			</table>
			<?= str_repeat("-", 37) ?>
			<br>
			<center>
				Terima Kasih atas Kunjungan Anda <br>
				Semoga Berkenan
			</center>
			<br /><br /><br /><br />
			<p></p>
		</section>
		<script>
			var lama = 1000;
			t = null;
			function printOut() {
				window.print();
				t = setTimeout("self.close()", lama);
			}
		</script>
	<?php } else {
} ?>
</body>

</html>