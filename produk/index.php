<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	?>
	<meta http-equiv="refresh" content="0;url=../login.php">
	<?php
}
if ($_SESSION['level'] == 'petugas') {
	header('Location: ../index.php');
}
?>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Produk</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
</head>

<body>
	<?php include "../header.php" ?>
	<main class="container border py-3">
		<br><br><br>
		<!-- pencarian -->
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h3>Daftar Produk</h3>
				</div>
				<div class="col-sm-4">
					<form class="d-flex" method="GET" action="">
						<input class="form-control me-2" type="text" placeholder="Search" name="np">
						<button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
  <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018"/>
  <path d="M13 6.5a6.47 6.47 0 0 1-1.258 3.844q.06.044.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11"/>
</svg></button>
					</form>
				</div>
			</div>
		</div>
		<!-- akhir pencarian -->

		<table class="table table-hover table-striped table-sm">
			<thead class="bg-primary text-white">
				<tr>
					<th class="p-3 rounded-start" width="55px">No.</th>
					<th class="py-3" width="100px">Kode</th>
					<th class="py-3">Nama Produk</th>
					<th class="py-3 text-end" width="100px">Harga</th>
					<th class="py-3 text-end" width="70px">Stok</th>
					<th class="py-3 text-center rounded-end" width="130px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include "../config.php";
				$batas = 5;
				$halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
				$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

				$previous = $halaman - 1;
				$next = $halaman + 1;

				if (isset($_GET['np'])) {
					$np = $_GET['np'];
					$sqldata = "select * from produk where nama_produk like '%$np%'";
				} else {
					$sqldata = "select * from produk";
				}
				$resdata = mysqli_query($koneksi, $sqldata);
				$jumlah_data = mysqli_num_rows($resdata);
				$total_halaman = ceil($jumlah_data / $batas);

				if (isset($_GET['np'])) {
					$np = $_GET['np'];
					$sql = "select * from produk where nama_produk like '%$np%' limit $halaman_awal, $batas";
				} else {
					$sql = "select * from produk limit $halaman_awal, $batas";
				}

				$result = mysqli_query($koneksi, $sql);
				$no = $halaman_awal + 1;
				while ($data = mysqli_fetch_array($result)) {
					$hp = number_format($data['harga'], 0, ",", ".");
					$kp = $data['kode_produk'];
					$stokawal = $data['stok'];
					$sqlst = "select * from detail_penjualan where kode_produk='$kp'";
					$resst = mysqli_query($koneksi, $sqlst);
					$jmlst = 0;
					while ($dtst = mysqli_fetch_array($resst)) {
						$jml = $dtst['jumlah'];
						$jmlst = $jmlst + $jml;
					}
					$sqltp = "select * from tambah_stok where kode_produk='$kp'";
					$restp = mysqli_query($koneksi, $sqltp);
					$jmltp = 0;
					while ($dttp = mysqli_fetch_array($restp)) {
						$jml = $dttp['jumlah'];
						$jmltp = $jmltp + $jml;
					}
					$stokakhir = $stokawal - $jmlst + $jmltp;
					$sp = number_format($stokakhir, 0, ",", ".");
					if ($stokakhir <= 0) {
						$st_akhir = "<span class='text-danger'><b>Habis</b></span>";
					} else {
						$st_akhir = $sp;
					}
					?>
					<tr>
						<td class="px-3"><?= $no ?>.</td>
						<td><?= $data['kode_produk'] ?></td>
						<td><?= $data['nama_produk'] ?></td>
						<td align="right"><?= $hp ?></td>
						<td align="right"><?= $st_akhir ?></td>
						<td align="right">
							<a href="" class="btn btn-success btn-sm" data-bs-toggle="modal"
								data-bs-target="#modaledit<?= $data['id_produk'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a>

							<a class="btn btn-danger btn-sm" href="delete.php?id=<?= $data['id_produk'] ?>"
								onclick="return confirm('Apakah Anda Yakin data produk <?= $data['nama_produk'] ?> akan dihapus ?')"
								class="hapus"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></a>
						</td>
					</tr>

					<!-- Modal Edit -->
					<div class="modal fade" id="modaledit<?= $data['id_produk'] ?>">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">

								<!-- Modal Header -->
								<div class="modal-header">
									<h3 class="modal-title">Edit Data Produk</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								</div>
								<form method="POST" action="update.php?halaman=<?= $halaman ?>">
									<!-- Modal body -->
									<div class="modal-body">
										<div class="row my-1">
											<div class="col-4">
												Kode Produk
											</div>
											<div class="col-8">
												<input type="hidden" name="id" value="<?= $data['id_produk'] ?>">
												<input type="text" name="kp" class="form-control"
													value="<?= $data['kode_produk'] ?>">
											</div>
										</div>
										<div class="row my-1">
											<div class="col-4">
												Nama Produk
											</div>
											<div class="col-8">
												<input type="text" name="np" class="form-control"
													value="<?= $data['nama_produk'] ?>">
											</div>
										</div>
										<div class="row my-1">
											<div class="col-4">
												Harga
											</div>
											<div class="col-8">
												<input type="text" name="hp" class="form-control"
													value="<?= $data['harga'] ?>">
											</div>
										</div>
										<div class="row my-1">
											<div class="col-4">
												Stok
											</div>
											<div class="col-8">
												<input type="text" name="sp" class="form-control"
													value="<?= $data['stok'] ?>">
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
					<td colspan="6" class="text-center">
						<div class="container">
							<div class="row">
								<div class="col-4 text-start py-3">

									<!-- tombol input	 -->
									<button type="button" class="btn btn-primary" data-bs-toggle="modal"
										data-bs-target="#myModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
</svg></button>
									<button type="button" class="btn btn-secondary" data-bs-toggle="modal"
										data-bs-target="#tambahstok"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg></button>
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

		<!-- Modal Tambah Stok -->
		<div class="modal fade" id="tambahstok">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h3 class="modal-title">Tambah Stok</h3>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<form method="POST" action="tambah_stok_simpan.php?halaman=<?= $halaman ?>">
						<!-- Modal body -->
						<div class="modal-body">
							<div class="row my-1">
								<div class="col-4">
									Kode Produk
								</div>
								<div class="col-8">
									<input list="kode_produk" id="kp" name="kp" autocomplete="off"
										placeholder="Kode Produk" class="form-control me-2" />
									<datalist id="kode_produk">
										<?php
										include "../config.php";
										$sqlp = "select * from produk";
										$resp = mysqli_query($koneksi, $sqlp);
										while ($dtp = mysqli_fetch_array($resp)) {
											?>
											<option value="<?= $dtp['kode_produk'] ?>"><?= $dtp['nama_produk'] ?></option>
											<?php
										}
										?>
									</datalist>
								</div>
							</div>

							<div class="row my-1">
								<div class="col-4">
									Jumlah
								</div>
								<div class="col-8">
									<input type="number" name="jml" class="form-control">
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

		<!-- akhir modal Tambah Stok -->
	</main>
	<?php include "../footer.php" ?>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>