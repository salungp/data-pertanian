<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Site logo
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Logo</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit logo</h3>
      </div>
      <div class="box-header">
        <form action="<?php echo base_url('general/logo_store'); ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="logo" id="button-logo">
              <i class="fa fa-photo"></i>
              <img src="" alt="image preview" id="image-preview" />
            </label>
            <input type="file" name="logo" id="logo" style="display: none;">
            <?php echo '<small class="text-danger">'.@$error.'</small>' ?>
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="<?php echo base_url('home'); ?>" class="btn btn-danger">Batal</a>
        </form>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>