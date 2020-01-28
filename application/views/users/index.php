<div class="content-wrapper">
  <?php $user = $this->User->loggedIn();
    if ($user['role_id'] != 1) : ?>
      <div class="content-header">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Danger!</h4>
          Maaf anda tidak ada akses untuk halaman ini!
        </div>
      </div>
  <?php else : ?>
    <section class="content-header">
      <h1>
        Admin users
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin users</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <?php echo $this->session->flashdata('messages'); ?>
      <div class="box">
        <div class="box-header with-border">
          <a href="<?php echo base_url('users/create'); ?>" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            <span>Tambah user</span>
          </a>
        </div>

        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">NO</th>
              <th>ACTION</th>
              <th>USERNAME</th>
              <th>ACCESS</th>
              <th>CREATED AT</th>
            </tr>
            <?php $i = 1; foreach($data as $key) : ?>
              <tr>
                <td><?php echo $i++; ?>.</td>
                <td>
                  <div class="input-group">
                    <a href="<?php echo base_url('users/'.$key['id'].'/edit'); ?>" class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?php echo base_url('users/'.$key['id'].'/destroy'); ?>" onclick="return window.confirm('Yakin mau dihapus!')" class="btn btn-danger">
                      <i class="fa fa-trash"></i>
                    </a>
                  </div>
                </td>
                <td><?php echo $key['username']; ?></td>
                <td>
                  <?php
                    switch ($key['role_id']) {
                      case 1:
                        echo '<span class="badge bg-green">Admin</span>';
                        break;
                      
                      case 2:
                        echo '<span class="badge bg-yellow">Editor</span>';
                        break;

                      case 3:
                        echo '<span class="badge bg-red">Visitor</span>';
                        break;
                    }
                  ?>
                </td>
                <td><?php echo date('d M Y', strtotime($key['created_at'])); ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </div>