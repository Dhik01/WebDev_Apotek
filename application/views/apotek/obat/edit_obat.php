<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Apotek | Admin - Edit Data Obat </title>
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
            <h1 align="center"> Edit Data Obat </h1>
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
              <?php echo form_open_multipart('C_apotek/update_data_obat');?>
                <div class="form-group">
                <label> Kode Obat </label>
                <input type="hidden" name="id_obat" class="form-control" value="<?php echo $apt->id_obat ?>">
                <input type="text" name="kode_obat" class="form-control" value="<?php echo $apt->kode_obat ?>" readonly="readonly">
                <div class="form-group">
                	<label> Nama Obat </label>
                	<input type="text" name="nama_obat" class="form-control" value="<?php echo $apt->nama_obat ?>">
                </div>
                <div class="form-group">
                  <label> Jenis </label>
                  <input type="text" name="jenis" class="form-control" value="<?php echo $apt->jenis ?>">
                </div>
                <div class="form-group">
                  <label> Harga </label>
                  <input type="text" name="harga" class="form-control" value="<?php echo $apt->harga ?>"> 
                </div>
                <div class="form-group">
                  <label> Expired </label>
                  <input type="date" name="expired" class="form-control" value="<?php echo $apt->expired ?>"> 
                </div>
                <div class="form-group"> 
                  <label> Gambar Obat </label><br>
                  <img src="<?php echo base_url();?>assets/foto/<?php echo $apt->foto;?>" width="90" height="110"><br>
                  <label><?php echo $apt->foto;?></label> 
                  <input type="hidden" name="old_foto" class="form-control" value="<?php echo $apt->foto;?>">
                  <input type="file" name="foto" class="form-control">
                </div>
                <a href="<?php echo base_url('C_apotek/obat'); ?>" class=" btn btn-primary"> Kembali </a>
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
