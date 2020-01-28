<div class="content-wrapper">
	<section class="content-header">
		<h1>Keterangan lanjut</h1>
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
			<li class="active">Create</li>
		</ol>
	</section>
	<section class="content container-fluid">
		<?php echo $this->session->flashdata('message'); ?>
		<div class="box">
			<div class="box-header with-border">
				<h2 class="box-title">Input data</h2>
			</div>
			<div class="box-body">
				<form method="POST" action="<?php echo base_url('pengguna/store_2/'.$id); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label>Foto orang</label>
						<label for="foto_orang" id="button-logo">
              <i class="fa fa-photo"></i>
              <img src="" alt="image preview" id="orang-preview" />
            </label>
            <input type="file" name="foto_orang" id="foto_orang" style="display: none;" required>
            <?php echo '<small class="text-danger">'.@$error.'</small>' ?>
					</div>

					<div class="form-group">
						<label>Foto KK</label>
						<label for="foto_kk" id="button-logo">
              <i class="fa fa-photo"></i>
              <img src="" alt="image preview" id="kk-preview" />
            </label>
            <input type="file" name="foto_kk" id="foto_kk" style="display: none;" required>
            <?php echo '<small class="text-danger">'.@$error.'</small>' ?>
					</div>

					<div class="form-group">
						<label>Foto lahan</label>
						<label for="foto_lahan" id="button-logo">
              <i class="fa fa-photo"></i>
              <img src="" alt="image preview" id="lahan-preview" />
            </label>
            <input type="file" name="foto_lahan" id="foto_lahan" style="display: none;" required>
            <?php echo '<small class="text-danger">'.@$error.'</small>' ?>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</section>
</div>