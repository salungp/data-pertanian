<?php
  $user = $this->User->loggedIn();
  $logo = $this->GeneralModel->logo();
?>
<header class="main-header">
  <a href="<?php echo base_url('home'); ?>" class="logo">
    <span class="logo-mini">
      PTN
    </span>

    <span class="logo-lg">
      PERTANIAN
    </span>
  </a>

  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="<?php echo base_url('assets/img/default_image.jpg'); ?>" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo $user['username']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="<?php echo base_url('assets/img/default_image.jpg'); ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $user['username']; ?> - Admin
                <small>Member since <?php echo date('M. Y', strtotime($user['created_at'])); ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                  <a href="<?php echo base_url('profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
              <div class="pull-right">
                <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>