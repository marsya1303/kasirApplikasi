<header class="container-fluid" style="position:fixed; z-index:9999; background-color: #e774c3;">
	<nav class="container navbar navbar-expand-sm navbar-dark" style="background-color: #e774c3;">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<h2>SKAPATISSERIE</h2>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse  justify-content-end" id="collapsibleNavbar">
				<ul class="navbar-nav">
					
					
					<?php if ($_SESSION['level'] == "admin") { ?>
						<li class="nav-item">
						<a class="nav-link btn-sm btn-primary text-white rounded-3 px-4 mx-1 my-1"
							href="../dashboard">Dashboard</a>
					</li>
						<li class="nav-item">
							<a class="nav-link btn-sm btn-primary text-white rounded-3 px-4 mx-1 my-1"
								href="../produk">Produk</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn-sm btn-primary text-white rounded-3 px-4 mx-1 my-1"
								href="../pelanggan">Pelanggan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn-sm btn-primary text-white rounded-3 px-4 mx-1 my-1"
								href="../petugas">Petugas</a>
						</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link btn-sm btn-primary text-white rounded-3 px-4 mx-1 my-1"
							href="../penjualan">Penjualan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn-sm btn-primary text-white rounded-3 px-4 mx-1 my-1"
							href="../report">Laporan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn-sm btn-secondary text-white rounded-3 px-4 mx-1 my-1"
							href="../logout.php" >Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>