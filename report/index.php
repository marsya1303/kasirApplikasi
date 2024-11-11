<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	?>
	<meta http-equiv="refresh" content="0;url=../login.php">
	<?php
} else {
	$tglsekarang = date('Y-m-d');
	?>
	<html>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Laporan Penjualan</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	</head>

	<body>
		<?php include "../header.php" ?>
		<br><br><br>
		<main class="container border py-2 mt-2">
			<div class="row">
				<div class="col">
					<div class="border p-3 my-3 bg-primary text-light rounded">
						<h4>Laporan Harian</h4>
						<form class="d-flex" method="POST" action="">
						<input class="form-control me-2" type="date" name="tgl"
						value="<?= $_POST['tgl'] ?? $tglsekarang ?>" required>
						<?php 
						
								if ($_SESSION['level']== 'admin'){

								
								?>
							
							<input list="nama_petugas" id="np" name="np" autocomplete="off" placeholder="Nama Petugas"
								class="form-control me-2" />
								
							<datalist id="nama_petugas">
								<?php
								include "../config.php";
								$sqlp = "select * from petugas";
								$resp = mysqli_query($koneksi, $sqlp);
								while ($dtp = mysqli_fetch_array($resp)) {
									?>
									<option value="<?= $dtp['nama_petugas'] ?>"><?= $dtp['nama_petugas'] ?></option>
									<?php
								}
								?>
							</datalist>
						<?php	
						}
							?>
							<button class="btn btn-light" name="tampil" type="submit">Tampilkan</button>
						</form>
					</div>
				</div>
				<div class="col">
					<div class="border p-3 my-3 bg-primary text-light rounded">
						<h4>Laporan Bulanan</h4>
						<form class="d-flex" method="POST" action="">
							<input class="form-control me-2" type="month" name="bln"
								value="<?= $_POST['bln'] ?? substr($tglsekarang, 0, 7) ?>" required>
								<?php 
						
								if ($_SESSION['level']== 'admin'){

								
								?>
							<input list="nama_petugas" id="np" name="np" autocomplete="off" placeholder="Nama Petugas"
								class="form-control me-2" />
							<datalist id="nama_petugas">
								<?php
								include "../config.php";
								$sqlp = "select * from petugas";
								$resp = mysqli_query($koneksi, $sqlp);
								while ($dtp = mysqli_fetch_array($resp)) {
									?>
									<option value="<?= $dtp['nama_petugas'] ?>"><?= $dtp['nama_petugas'] ?></option>
									<?php
								}
								?>
							</datalist>
							<?php
								}
								?>
							<button class="btn btn-light" name="tampil" type="submit">Tampilkan</button>
						</form>
					</div>
				</div>
			</div>

			<!-- pencarian -->

			<div class="row">
				<?php
				if (isset($_POST['tampil'])) {
					if ($_SESSION['level']== 'admin'){
						$np = $_POST['np'];
					} else {
						$np = "";
					}
					
					$tgl = $_POST['bln'] ?? $_POST['tgl'];
					$tg = substr($tgl, 8, 2);
					$bl = substr($tgl, 5, 2);
					$th = substr($tgl, 0, 4);
					$bul = number_format($bl);
					$bln = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
					$tanggal = $tg ? "Tanggal " . $tg . " " . $bln[$bul] . " " . $th : "Bulan " . $bln[$bul] . " " . $th;
				} else {
					$tanggal = "";
					$np = "";
				}
				?>
				<div class="col-sm-8">
					<h5>Laporan Penjualan <?= $tanggal ?></h5>
				</div>
				<?php
				if ($np) {
					?>
					<div class="col-sm-4 text-end">
						<h5>Nama Petugas : <?= $np ?></h5>
					</div>
					<?php
				}
				?>

			</div>
			<table class="table table-hover table-striped table-sm">
				<thead class="bg-primary text-white">
					<tr>
						<th class="py-2 px-3 rounded-start" width="55px">No.</th>
						<th class="py-2" width="100px">Tanggal</th>
						<th class="py-2" width="100px">Kode</th>
						<th class="py-2">Nama Produk</th>
						<th class="py-2 text-end" width="100px">Harga</th>
						<th class="py-2 px-3 text-end" width="100px">Jumlah</th>
						<th class="py-2 px-3 text-end" width="100px">Total</th>
						<th class="py-2 text-start rounded-end" width="200px">Nama Petugas</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include "../config.php";
					if (isset($_POST['tampil'])) {
						if ($_SESSION['level']== 'admin'){
							$sql = "SELECT p.tanggal, p.id_petugas, p.nama_petugas, d.kode_produk, d.nama_produk, d.harga, d.jumlah, d.harga * d.jumlah AS total FROM penjualan p INNER JOIN  detail_penjualan d ON p.penjualan_id = d.penjualan_id WHERE p.tanggal LIKE '$tgl%' AND p.nama_petugas LIKE '$np%'";

						} else {
							$nama_petugas= $_SESSION['nama_petugas'];
							$sql = "SELECT p.tanggal, p.id_petugas, p.nama_petugas, d.kode_produk, d.nama_produk, d.harga, d.jumlah, d.harga * d.jumlah AS total FROM penjualan p INNER JOIN  detail_penjualan d ON p.penjualan_id = d.penjualan_id WHERE p.tanggal LIKE '$tgl%' AND p.nama_petugas LIKE '$nama_petugas%'";

						}
						
						$result = mysqli_query($koneksi, $sql);
						$no = 1;
						$jmltot = 0;
						while ($data = mysqli_fetch_array($result)) {
							$hp = number_format($data['harga'], 0, ",", ".");
							$jp = number_format($data['jumlah'], 0, ",", ".");
							$total = $data['harga'] * $data['jumlah'];
							$tot = number_format($total, 0, ",", ".");
							?>
							<tr>
								<td class="px-3"><?= $no ?>.</td>
								<td><?= substr($data['tanggal'], 0, 10) ?></td>
								<td><?= $data['kode_produk'] ?></td>
								<td><?= $data['nama_produk'] ?></td>
								<td align="right"><?= $hp ?></td>
								<td align="right" class="px-3"><?= $jp ?></td>
								<td align="right" class="px-3"><?= $tot ?></td>
								<td><?= $data['nama_petugas'] ?></td>
							</tr>

							<?php
							$no++;
							$jmltot += $total;
							$jmltotal = number_format($jmltot, 0, ",", ".");

						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<td></td>
							<td colspan="5" class="text-start py-2">
								<b>Total :</b>
							</td>
							<td class="text-end px-3">
								<?php
								if (empty($jmltotal)) {
									$jmltotal = 0;
								}
								?>
								<b><?= $jmltotal ?></b>
							</td>
							<td></td>
						</tr>
					</tfoot>
				<?php } ?>
				</div>
			</table>
			<?= isset($_POST['tampil']) ? "<a href='reportprint.php?np=$np&tgl=$tgl' target='_blank' class='btn btn-primary'>Cetak Laporan</a>" : '' ?>
			<br>
		</main>
		<br><br>
		<?php include_once "../footer.php" ?>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
	</body>

	</html>
<?php } ?>