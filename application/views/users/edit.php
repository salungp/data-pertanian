<?php $user = $this->User->loggedIn(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Edit user</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url(); ?>">
					<i class="fa fa-dashboard"></i>
					<span>Home</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('users'); ?>">Admin users</a>
			</li>
			<li class="active">Create</li>
		</ol>
	</section>
	<section class="content container-fluid">
		<?php echo $this->session->flashdata('message'); ?>
		<div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Edit user</h3>
      </div>

      <form role="form" action="<?php echo base_url('users/'.$data['id'].'/update'); ?>" method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required value="<?php echo $data['username']; ?>">
          </div>
          <div class="form-group">
            <label for="akses">Akses</label>
            <select name="role_id" id="akses" class="form-control" required>
            	<?php if ($user['role_id'] == 1) : ?>
            		<option value="1" <?php echo $data['role_id'] == 1 ? 'selected' : ''; ?>>Admin</option>
            	<?php endif; ?>
            	<option value="2" <?php echo $data['role_id'] == 2 ? 'selected' : ''; ?>>Editor</option>
            	<option value="3" <?php echo $data['role_id'] == 3 ? 'selected' : ''; ?>>Visitor</option>
            </select>
          </div>
          <div class="form-group">
          	<label for="password"> New password?</label>
          	<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
          </div>
          <div class="form-group">
          	<label for="password_confirm">Konfirmasi password</label>
          	<input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Konfirmasi password">
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?php echo base_url('users'); ?>" class="btn btn-default">Kembali</a>
        </div>
      </form>
    </div>
	</section>
</div>