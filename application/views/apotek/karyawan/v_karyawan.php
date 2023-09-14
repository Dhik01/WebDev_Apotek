<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Apotek | Admin - Data Karyawan </title>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#inputModal"><i class="fa fa-plus"></i> Tambah Data </button>
            <a class="btn btn-danger" href=" <?php echo base_url('C_apotek/cetak_data_karyawan') ?>"> <i class="fa fa-print"></i> Print </a>
            <a class="btn btn-success" href=" <?php echo base_url('C_apotek/pdf_karyawan') ?>"> <i class="fa fa-download"></i> PDF </a>
            <a class="btn btn-success" href=" <?php echo base_url('C_apotek/excel_karyawan') ?>"> <i class="fa fa-download"></i> EXCEL </a>
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
                    <th data-orderable="false"> Detail </th>
                    <th data-orderable="false"> Hapus </th>
                    <th data-orderable="false"> Edit </th>  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($apotek as $apt) : ?>
                  <tr align="center">
                    <td><?php echo $apt->kode_karyawan ?></td>
                    <td><?php echo $apt->nama_karyawan ?></td>
                    <td><?php echo $apt->tgl_lhr ?></td>
                    <td><?php echo $apt->shif ?></td>
                    <td align="center">
                      <a class="btn btn-success btn-sm " href="<?php echo base_url('C_apotek/detail_karyawan/'.$apt->id_karyawan)?>">
                        <i class="fa fa-search-plus"></i>
                      </a>
                    </td > 
                    <td onclick="javascript: return  confirm('Anda yakin ingin hapus data ini ?')" align="center">
                      <a class="btn btn-danger btn-sm " href="<?php echo base_url('C_apotek/hapus_data_karyawan/'.$apt->id_karyawan)?>">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                    <td align="center">
                      <a class="btn btn-primary btn-sm " href="<?php echo base_url('C_apotek/edit_data_karyawan/'.$apt->id_karyawan)?>">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
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
  <!-- /.content-wrapper -->
        <!-- Modal -->
        <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA KARYAWAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('C_apotek/tambah_data_karyawan');?>
                  <div class="form-group">
                    <label> Kode Karyawan </label>
                    <input type="text" name="kode_karyawan" class="form-control" placeholder="KRY000" required>
                  </div>
                  <div class="form-group">
                    <label> Nama Karyawan </label>
                    <input type="text" name="nama_karyawan" class="form-control" placeholder="Abcd..." required>
                  </div>
                  <div class="form-group">
                    <label> Tanggal Lahir </label>
                    <input type="date" name="tgl_lhr" class="form-control" placeholder="Tahun-bulan-hari" required>
                  </div>
                  <div class="form-group">
                    <label> Shif </label>
                    <input type="text" name="shif" class="form-control" placeholder="1 atau 2" required>
                  </div>
                  <button type="reset" class="btn btn-danger" data-dismiss="modal"> Reset </button>
                  <button type="submit" class="btn btn-primary"> Simpan </button>
                </form>
              </div>
            </div>
          </div>
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
<script>
    $(function () {
      $("#example1").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "responsive": true, 
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
