<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data diri
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url('pengguna'); ?>"> Pengguna</a></li></li>
      <li class="active">Create</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content container-fluid">
    <?php echo $this->session->flashdata('message'); ?>

    <form role="form" action="<?php echo base_url('pengguna/store'); ?>" method="POST">

        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Data diri</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama pengguna" required>
              </div>

              <div class="form-group">
                <label for="rt/rw">RT/RW</label>
                <div class="input-group" style="max-width: 200px;">
                  <input type="number" name="rt" class="form-control" placeholder="RT" required>
                  <input type="number" name="rw" class="form-control" placeholder="RW" required>
                </div>
              </div>

              <div class="form-group">
                <label for="province">Provinsi</label>
                <select class="form-control" id="province" data-id="">
                  <option>-pilih-</option>
                </select>
              </div>

              <div class="form-group">
                <label for="city">Kabupaten</label>
                <select name="city" id="city" class="form-control"></select>
              </div>

              <div class="form-group">
                <label for="kec">Kecamatan</label>
                <select name="kec" id="kec" class="form-control"></select>
              </div>

              <div class="form-group">
                <label for="vilage">Desa</label>
                <select name="vilage" id="vilage" class="form-control"></select>
              </div>

              <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" name="nik" id="nik" class="form-control" placeholder="Nomor induk kependudukan" required>
              </div>

              <div class="form-group">
                <label for="no_kk">No KK</label>
                <input type="number" name="no_kk" id="no_kk" class="form-control" placeholder="Nomor KK" required>
              </div>

              <div class="form-group">
                <label for="no_anggota">No anggota</label>
                <input type="text" name="no_anggota" id="id_anggota" class="form-control" placeholder="No anggota" required>
              </div>

              <div class="form-group">
                <label for="titik_koordinat">Titik koordinat</label>
                <div class="input-group" style="max-width: 400px;">
                  <input type="text" name="LS" class="form-control" placeholder="LS" required>
                  <input type="text" name="BT" class="form-control" placeholder="BT" required>
                </div>
              </div>

              <div class="form-group">
                <label for="luas/panen/biaya_tanam">Luas/Panen/Biaya tanam</label>
                <div class="input-group" style="max-width: 400px;">
                  <input type="number" name="luas" class="form-control" placeholder="Luas(m2)" required>
                  <input type="number" name="panen" class="form-control" placeholder="Panen(Kg)" required>
                  <input type="number" name="biaya_tanam" class="form-control" placeholder="Biaya tanam(Rp)" required>
                </div>
              </div>

              <a href="<?php echo base_url('pengguna'); ?>" class="btn btn-default ">Kembali</a>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </div>
          <!-- /.tab-content -->
        </div>

      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->