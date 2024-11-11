<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header('Location: ../login.php');
}

if (isset($_SESSION['penid'])) {
	?>
	<meta http-equiv="refresh" content="1;url=transaksi.php">
	<?php
} else {
	?>
	<html>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Daftar Penjualan</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	
		
	</head>

	<body>
		<?php include "../header.php" ?>
		<main class="container border py-3">
			<br><br><br>
			<!-- pencarian -->

			<div class="row">
				<div class="col-sm-8">
					<h3>Daftar Penjualan</h3>
				</div>
				<div class="col-sm-4">
					<form class="d-flex" method="GET" action="">
						<input class="form-control me-2" type="date" name="tgl">
						<button class="btn btn-primary" type="submit">Cari</button>
					</form>
				</div>
			</div>

			<!-- akhir pencarian -->

			<table class="table table-hover table-striped table-sm">
				<thead class="bg-primary text-white">
					<tr>
						<th class="py-2 px-3 rounded-start" width="55px">No.</th>
						<th class="py-2" width="200px">Tanggal</th>
						<th class="py-2 text-end" width="100px">Total Harga</th>
						<th class="py-2 text-end" width="100px">Bayar</th>
						<th class="py-2 text-end" width="100px">Kembali</th>
						<th class="py-2 px-3" width="200px">Pelanggan</th>
						<th class="py-2" width="200px">Petugas</th>
						<th class="py-2 text-center rounded-end" width="130px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include "../config.php";
					$id_petugas = $_SESSION['id_petugas'];
					$batas = 10;
					$halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
					$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

					$previous = $halaman - 1;
					$next = $halaman + 1;
					$tglskr = date("Y-m-d");
					if (isset($_GET['tgl'])) {
						$tgl = $_GET['tgl'];
						$sqldata = "select * from penjualan where tanggal like '$tgl%' and id_petugas='$id_petugas'";
					} else {
						$sqldata = "select * from penjualan where tanggal like '$tglskr%' and id_petugas='$id_petugas'";
					}
					$resdata = mysqli_query($koneksi, $sqldata);
					$jumlah_data = mysqli_num_rows($resdata);
					$total_halaman = ceil($jumlah_data / $batas);

					if (isset($_GET['tgl'])) {
						$tgl = $_GET['tgl'];
						$sql = "select * from penjualan where tanggal like '$tgl%' and id_petugas='$id_petugas' limit $halaman_awal, $batas";
					} else {
						$sql = "select * from penjualan where tanggal like '$tglskr%' and id_petugas='$id_petugas' limit $halaman_awal, $batas";
					}
					$result = mysqli_query($koneksi, $sql);
					$no = $halaman_awal + 1;
					while ($data = mysqli_fetch_array($result)) {

						$tohar = number_format($data['total_harga'], 0, ",", ".");
						$byr = number_format($data['bayar'], 0, ",", ".");
						$kembali = $data['bayar'] - $data['total_harga'];
						$kbl = number_format($kembali, 0, ",", ".");
						$id_pelanggan = $data['id_pelanggan'];
						$id_petugas = $data['id_petugas'];
						$sqlpetugas = "select * from petugas where id_petugas='$id_petugas'";
						$respetugas = mysqli_query($koneksi, $sqlpetugas);
						$dtpetugas = mysqli_fetch_array($respetugas);
						if (!$id_pelanggan) {
							$dtpelanggan['nama_pelanggan'] = 'umum';
						} else {
							$sqlpelanggan = "select * from pelanggan where id_pelanggan='$id_pelanggan'";
							$respelanggan = mysqli_query($koneksi, $sqlpelanggan);
							$dtpelanggan = mysqli_fetch_array($respelanggan);
						}
						?>
						<tr>
							<td class="px-3"><?= $no ?>.</td>
							<td><?= $data['tanggal'] ?></td>
							<td align="right"><?= $tohar ?></td>
							<td align="right"><?= $byr ?></td>
							<td align="right"><?= $kbl ?></td>
							<td class="px-3"><?= $dtpelanggan['nama_pelanggan'] ?></td>
							<td><?= $dtpetugas['nama_petugas'] ?></td>
							<td align="right">
								<a href="printnota.php?penid=<?= $data['penjualan_id'] ?>&kbl=<?= $kbl ?>" target="_blank"
									class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
  <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27m.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0z"/>
  <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5"/>
</svg></a>
								<a href="detail_penjualan.php?penid=<?= $data['penjualan_id'] ?>&npet=<?= $dtpetugas['nama_petugas'] ?>&npel=<?= $dtpelanggan['nama_pelanggan'] ?>&tgl=<?= $data['tanggal'] ?>&byr=<?= $byr ?>&kbl=<?= $kbl ?>&halaman=<?= $halaman ?>"
									class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
</svg></a>

							</td>
						</tr>

						<!-- Modal Edit -->
						<div class="modal fade" id="modaledit<?= $data['penjualan_id'] ?>">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h3 class="modal-title">Edit Data Produk</h3>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<!-- Modal body -->
									<div class="modal-body">
										<div class="row my-1">
											<div class="col-12">

											</div>

										</div>
									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" name="save">Simpan</button>
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
									</div>
									</form>
								</div>
							</div>
						</div>

						<!-- akhir modal Edit -->

						<?php
						$no++;
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="8" class="text-center">
							<div class="container">
								<div class="row">
									<div class="col-4 text-start py-3">

										<a class="btn btn-primary" href="penjualan_simpan.php">[+] Penjualan Baru</a>
									</div>
									<div class="col-8 text-end py-3">

										<!-- Untuk nomor Halaman -->
										<ul class="pagination justify-content-end pagination-sm">
											<li class="page-item"><a class="page-link" <?php if ($halaman > 1) {
												echo "href='?halaman=$previous'";
											} ?>>&laquo; Previous</a></li>

											<?php
											for ($x = 1; $x <= $total_halaman; $x++) {
												if ($x == $halaman) {
													?>
													<li class="page-item active"><a class="page-link"
															href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
													<?php
												} else {
													?>
													<li class="page-item"><a class="page-link"
															href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
													<?php
												}
											}
											?>
											<li class="page-item"><a class="page-link" <?php if ($halaman < $total_halaman) {
												echo "href='?halaman=$next'";
											} ?>>Next &raquo;</a></li>
										</ul>
									</div>
								</div>
							</div>

						</td>
					</tr>
				</tfoot>
			</table>
			</div>
			<!-- Modal Form -->
			<div class="modal fade" id="myModal">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h3 class="modal-title">Input Data Produk</h3>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<form method="POST" action="simpan.php?halaman=<?= $halaman ?>">
							<!-- Modal body -->
							<div class="modal-body">
								<div class="row my-1">
									<div class="col-4">
										Kode Produk
									</div>
									<div class="col-8">
										<input type="text" name="kp" class="form-control">
									</div>
								</div>
								<div class="row my-1">
									<div class="col-4">
										Nama Produk
									</div>
									<div class="col-8">
										<input type="text" name="np" class="form-control">
									</div>
								</div>
								<div class="row my-1">
									<div class="col-4">
										Harga
									</div>
									<div class="col-8">
										<input type="text" name="hp" class="form-control">
									</div>
								</div>
								<div class="row my-1">
									<div class="col-4">
										Stok
									</div>
									<div class="col-8">
										<input type="text" name="sp" class="form-control">
									</div>
								</div>
							</div>

							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name="save">Simpan</button>
								<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- akhir modal Form -->
		</main>
		<?php include "../footer.php" ?>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
	</body>

	</html>
<?php } ?>