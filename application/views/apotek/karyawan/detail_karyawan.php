<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Apotek | Admin - Detail Data Karyawan </title>
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
            <h1 align="center"> Detail Data Karyawan </h1>
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
                <table class="table"> 
                  <tr> 
                    <th> Kode Karyawan </th>
                    <td>:</td>
                    <td><?php echo $detail->kode_karyawan ?></td> 
                  </tr> 
                  <tr> 
                    <th> Nama Karyawan </th>
                    <td>:</td>
                    <td><?php echo $detail->nama_karyawan ?></td> 
                  </tr> 
                  <tr> 
                    <th> Tanggal Lahir </th> 
                    <td>:</td>
                    <td><?php echo $detail->tgl_lhr ?></td> 
                  </tr> 
                  <tr> 
                    <th> Shif </th> 
                    <td>:</td>
                    <td><?php echo $detail->shif ?></td> 
                  </tr> 
                </table> 
                <br>
                <a href="<?php echo base_url('C_apotek/karyawan'); ?>" class=" btn btn-primary" > Kembali </a>
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












