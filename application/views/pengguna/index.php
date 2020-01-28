 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengguna
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pengguna</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
  <?php echo $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <a href="<?php echo base_url('pengguna/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
        <a href="<?php echo base_url('pengguna/excel'); ?>" class="btn btn-default"><i class="fa fa-file-excel-o"></i> Ekspor Excel</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="box-table">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>NO</th>
              <th style="min-width: 60px;">AKSI</th>
              <th>#</th>
              <th>NAMA</th>
              <th>ALAMAT</th>
              <th>NIK</th>
              <th>NO KK</th>
              <th>TITIK KOORDINAT</th>
              <th>LUAS/PANEN/BIAYA TANAM</th>
              <th>NOMOR ANGGOTA</th>
            </tr>
            </thead>
            <?php $i = 1; ?>
            <tbody>
            <?php foreach ($data as $key) : ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td>
                  <div class="btn-group">                   
                    <a href="<?php echo base_url('pengguna/'.$key['id'].'/edit'); ?>" class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a onclick="return window.confirm('Yakin mau dihapus?');" href="<?php echo base_url('pengguna/'.$key['id'].'/destroy'); ?>" class="btn btn-danger">
                      <i class="fa fa-trash"></i>
                    </a>
                  </div>
                </td>
                <td><a href="<?php echo base_url('pengguna/detail/'.$key['id']); ?>">Detail</a></td>
                <td><?php echo $key['name']; ?></td>
                <td><?php echo 'RT '.$key['rt/rw'].' '.$key['desa'].','.$key['kecamatan'].','.$key['kabupaten']; ?></td>
                <td><?php echo $key['nik']; ?></td>
                <td><?php echo $key['nomor_kk']; ?></td>
                <td><?php echo $key['titik_koordinat']; ?></td>
                <td><?php echo number_format($key['luas'], 0, ',', '.').'/'.number_format($key['panen'], 0, ',', '.').'/Rp. '.number_format($key['biaya_tanam'], 0, ',', '.'); ?></td>
                <td><?php echo $key['nomor_anggota']; ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>NO</th>
              <th>AKSI</th>
              <th>#</th>
              <th>NAMA</th>
              <th>ALAMAT</th>
              <th>NIK</th>
              <th>NO KK</th>
              <th>TITIK KOORDINAT</th>
              <th>LUAS/PANEN/BIAYA TANAM</th>
              <th>NOMOR ANGGOTA</th>
            </tr>
            </tfoot>  
          </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->