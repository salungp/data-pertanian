<div class="content-wrapper">
	<section class="content-header">
		<h1>Detail data</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url(); ?>">
					<i class="fa fa-dashboard"></i>
					<span>Home</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('pengguna'); ?>">Pengguna</a>
			</li>
			<li class="active">Detail</li>
		</ol>
	</section>
	<section class="content container-fluid">
		<div class="box">
			<div class="box-header with-border">
				<a href="<?php echo base_url('pengguna'); ?>" class="btn btn-default">
					kembali
				</a>
				<a href="#" class="btn btn-primary btn-print"><i class="fa fa-print"></i> print</a>
			</div>
			<div class="box-body body-print">
				<h4><b>Profil</b></h4>
				<div class="row">
					<div class="col-md-4">
						<div class="content-center">
							<img src="<?php echo base_url($data['foto_orang']); ?>" class="foto-orang" alt="foto-orang">
						</div>
					</div>
					<div class="col-md-8">
						<table class="table table-striped">
							<tr>
								<td>NAMA</td>
								<td>: <?php echo $pengguna['name']; ?></td>
							</tr>
							<tr>
								<td>DESA</td>
								<td>: <?php echo $pengguna['desa']; ?></td>
							</tr>
							<tr>
								<td>KECAMATAN</td>
								<td>: <?php echo $pengguna['kecamatan']; ?></td>
							</tr>
							<tr>
								<td>KABUPATEN/KOTA</td>
								<td>: <?php echo $pengguna['kabupaten']; ?></td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>: <?php echo $pengguna['nik']; ?></td>
							</tr>
							<tr>
								<td>NO KK</td>
								<td>: <?php echo $pengguna['nomor_kk']; ?></td>
							</tr>
						</table>
					</div>
				</div>

				<h4><b>Lahan</b></h4>
				<div class="row">
					<div class="col-md-4">
						<div class="content-center">
							<img src="<?php echo base_url($data['foto_lahan']); ?>" class="foto-lahan" alt="foto-lahan">
						</div>
					</div>
					<div class="col-md-8">
						<table class="table table-striped">
							<tr>
								<td>TITIK KOORDINAT</td>
								<td>: <?php echo $pengguna['titik_koordinat']; ?></td>
							</tr>
							<tr>
								<td>LUAS(m2)</td>
								<td>: <?php echo $pengguna['luas']; ?></td>
							</tr>
							<tr>
								<td>PANEN(Kg)</td>
								<td>: <?php echo $pengguna['panen']; ?></td>
							</tr>
							<tr>
								<td>BIAYA TANAM</td>
								<td>: <?php echo 'Rp. '.number_format($pengguna['biaya_tanam'], 2, ',', '.'); ?></td>
							</tr>
						</table>
					</div>
				</div>

				<h4><b>Foto KK</b></h4>
				<div class="row">
					<div class="col-md-4">
						<img src="<?php echo base_url($data['foto_kk']); ?>" class="foto-lahan" alt="foto-kk">
					</div>
				</div>
			</div>
		</div>
	</section>
</div>