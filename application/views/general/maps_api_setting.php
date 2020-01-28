<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Maps api</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Maps Api</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="box box-primary">
      <div class="box-header">
        <a href="<?php echo $this->agent->referrer(); ?>" class="btn btn-danger">Kembali</a>
      </div>
      <div class="box-body">
        <div class="callout callout-warning">
          <h4>Warning</h4>
          <p>Pastikan api key masih aktif.</p>
        </div>
        <form action="<?php echo base_url('general/maps_api_store/'.$data['slug']); ?>" method="POST">
          <div class="form-group">
            <label for="api_key">API key</label>
            <input type="text" name="api_key" id="api_key" class="form-control" value="<?php echo $data['value']; ?>" required>
          </div>
          <button class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>