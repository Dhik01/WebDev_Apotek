<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Apotek | Admin - Edit Data Karyawan </title>
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
            <h1 align="center">Edit Data Karyawan</h1>
          </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <?php echo form_open_multipart('C_apotek/update_data_karyawan');?>
                <div class="form-group">
                    <label>Kode Karyawan</label>
                    <input type="hidden" name="id_karyawan" class="form-control" value="<?php echo $apt->id_karyawan ?>">
                    <input type="text" name="kode_karyawan" class="form-control" value="<?php echo $apt->kode_karyawan ?>" readonly="readonly">
                <div class="form-group">
                  <label>Nama Karyawan</label>
                  <input type="text" name="nama_karyawan" class="form-control" value="<?php echo $apt->nama_karyawan ?>">
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tgl_lhr" class="form-control" value="<?php echo $apt->tgl_lhr ?>">
                </div>
                <div class="form-group">
                  <label>Shif</label>
                  <input type="text" name="shif" class="form-control" value="<?php echo $apt->shif ?>"> 
                </div>
                <a href="<?php echo base_url('C_apotek/karyawan'); ?>" class=" btn btn-primary">Kembali</a>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-success">Simpan</button>
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












