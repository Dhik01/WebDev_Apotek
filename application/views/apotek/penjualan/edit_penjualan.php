<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Apotek | Admin - Edit Data Penjualan </title>
  <?php //Loading head.php
    $this->load->view('apotek/templates/header');
  ?>
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
            <h1 align="center"> Edit Data Penjualan </h1>
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
              <?php echo form_open_multipart('C_apotek/update_data_penjualan');?>
                <div class="form-group">
                    <label> Kode Transaksi </label>
                    <input type="hidden" name="id_trans" class="form-control" value="<?php echo $apt->id_trans ?>">
                    <input type="text" name="kode_trans" class="form-control" value="<?php echo $apt->kode_trans ?>" readonly="readonly">
                <div class="form-group">
                	<label> Nama Obat </label>
                	<input type="text" name="nama_obat" class="form-control" value="<?php echo $apt->nama_obat ?>">
                </div>
                <div class="form-group">
                  <label> Tanggal Transaksi </label>
                  <input type="date" name="tgl_trans" class="form-control" value="<?php echo $apt->tgl_trans ?>">
                </div>
                <div class="form-group">
                  <label> Metode Bayar </label>
                  <input type="text" name="metode_bayar" class="form-control" value="<?php echo $apt->metode_bayar ?>"> 
                </div>
                <div class="form-group">
                  <label> Jumlah Beli </label>
                  <input type="text" name="jumlah_beli" class="form-control" value="<?php echo $apt->jumlah_beli ?>"> 
                </div>
                <div class="form-group">
                  <label> Nama Pelayan </label>
                  <input type="text" name="nama_pelayan" class="form-control" value="<?php echo $apt->nama_pelayan ?>"> 
                </div>          
                <div class="form-group">
                  <label> Nama penerima </label>
                  <input type="text" name="nama_penerima" class="form-control" value="<?php echo $apt->nama_penerima ?>"> 
                </div>
                <div class="form-group">
                  <label> Total Bayar </label>
                  <input type="text" name="total_bayar" class="form-control" value="<?php echo $apt->total_bayar ?>"> 
                </div>                                      
                <a href="<?php echo base_url('C_apotek/penjualan'); ?>" class=" btn btn-primary"> Kembali </a>
                <button type="reset" class="btn btn-danger"> Reset </button>
                <button type="submit" class="btn btn-success"> Simpan </button>
                </div>
              <?php echo form_close(); ?>
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
  <!-- /.content-wrapper -->
<?php //Loading footer.php
  $this->load->view('apotek/templates/footer');
?>

</body>
</html>
