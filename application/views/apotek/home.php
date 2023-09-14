<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Apotek | Admin - Home </title>
  <?php //Loading head.php
    $this->load->view('apotek/templates/header');
  ?>

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins')?>/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins')?>/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php //Loading navbar.php
      $this->load->view('apotek/templates/navbar');
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php //Loading sidebar.php
      $this->load->view('apotek/templates/sidebar');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <div class="col-sm-12">
              <h1 align="center">Data Karyawan</h1>
            </div>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="bg-info" align="center">
                      <th> Kode Karyawan </th>
                      <th> Nama Karyawan </th>
                      <th> Tanggal Lahir </th>
                      <th> Shif </th> 
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($karyawan as $kry) : ?>
                    <tr align="center">
                      <td><?php echo $kry->kode_karyawan ?></td>
                      <td><?php echo $kry->nama_karyawan ?></td>
                      <td><?php echo $kry->tgl_lhr ?></td>
                      <td><?php echo $kry->shif ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

      <!-- Content Header (Page header) -->
      <section class="content-header">
            <div class="col-sm-12">
              <h1 align="center">Data Obat</h1>
            </div>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="bg-info" align="center">
                      <th> Kode Obat </th>
                      <th> Nama Obat </th>
                      <th> Jenis </th>
                      <th> Harga </th>
                      <th> Expired </th> 
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($obat as $obt) : ?>
                    <tr align="center">
                      <td><?php echo $obt->kode_obat ?></td>
                      <td><?php echo $obt->nama_obat ?></td>
                      <td><?php echo $obt->jenis ?></td>
                      <td>Rp. <?php echo $obt->harga ?></td>
                      <td><?php echo $obt->expired ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

      <!-- Content Header (Page header) -->
      <section class="content-header">
            <div class="col-sm-12">
              <h1 align="center">Data Penjualan</h1>
            </div>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example3" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="bg-info" align="center">
                      <th> Kode Transaksi </th>
                      <th> Tanggal Transaksi </th>
                      <th> Metode Bayar </th>
                      <th> Jumlah Beli </th>
                      <th> Total Bayar </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($penjualan as $trx) : ?>
                    <tr align="center">
                      <td><?php echo $trx->kode_trans ?></td>
                      <td><?php echo $trx->tgl_trans ?></td>
                      <td><?php echo $trx->metode_bayar ?></td>
                      <td><?php echo $trx->jumlah_beli ?></td>
                      <td>Rp. <?php echo $trx->total_bayar ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

  <?php //Loading footer.php
    $this->load->view('apotek/templates/footer');
  ?>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo base_url('assets/plugins')?>/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/jszip/jszip.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>
</html>
