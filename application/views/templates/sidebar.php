<?php $user = $this->User->loggedIn(); ?>
<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/img/default_image.jpg'); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['username']; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Master data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('pengguna'); ?>"><i class="fa fa-circle-o"></i> <span>List data</span></a>
            </li>
            <li>
              <a href="<?php echo base_url('pengguna/create'); ?>"><i class="fa fa-circle-o"></i> <span>Tambah data</span></a>
            </li>
            <li>
              <a href="<?php echo base_url('pengguna/excel'); ?>"><i class="fa fa-circle-o"></i> <span>Ekspor excel</span></a>
            </li>
          </ul>
        </a>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-gears"></i> <span>App setings</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('users'); ?>"><i class="fa fa-circle-o"></i> Admin users</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>