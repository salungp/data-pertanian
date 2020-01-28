<?php $user = $this->User->loggedIn(); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Profile
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url('home'); ?>"> <i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li class="active">Profile</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <h2 class="box-title">Edit profile</h2>
      </div>
      <div class="box-body">
        <form action="<?php echo base_url('profile/update/'); ?>" method="POST">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo $user['username']; ?>" required>
          </div>
          <div class="form-group">
            <label for="password">New password?</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <a href="<?php echo $this->agent->referrer(); ?>" class="btn btn-default">Kembali</a>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </section>
</div>
