  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url().'C_apotek/index';?>" class="brand-link">
      <h2 align="center">APOTEK</h2>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist')?>/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <h5 class="d-block" style="color: white;"> Admin - <?php echo $this->session->userdata('nama'); ?> </h5>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url().'C_apotek/index';?>" class="nav-link <?php if($this->uri->uri_string()=="C_apotek/index"){echo "active";}?>" >
              <i class="nav-icon fa fa-home"></i>
              Beranda
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'C_apotek/obat';?>" class="nav-link <?php if($this->uri->uri_string()=="C_apotek/obat"){echo "active";}?>">
              <i class="nav-icon fa fa-medkit"></i>
              Data Obat
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'C_apotek/karyawan';?>" class="nav-link <?php if($this->uri->uri_string()=="C_apotek/karyawan"){echo "active";}?>">
              <i class="nav-icon fa fa-group"></i>
              Data Karyawan
            </a>
          </li>            
          <li class="nav-item">
            <a href="<?php echo base_url().'C_apotek/penjualan';?>" class="nav-link <?php if($this->uri->uri_string()=="C_apotek/penjualan"){echo "active";}?>">
              <i class="nav-icon fa fa-bar-chart"></i>
              Data Penjualan
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'Login/admin';?>" class="nav-link <?php if($this->uri->uri_string()=="Login/admin"){echo "active";}?>">
              <i class="nav-icon fa fa-share"></i>
              Log out
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>