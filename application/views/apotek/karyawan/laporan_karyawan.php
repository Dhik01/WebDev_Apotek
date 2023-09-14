<!DOCTYPE html>
<html><head>
  <title> PDF - Data Karyawan </title>
</head><body>
  <center><h1> Data Karyawan </h1></center>
  <table border="0.5" style="margin-left: auto; margin-right: auto;">
    <tr align="center">
      <th> Kode Karyawan </th>
      <th> Nama Karyawan </th>
      <th> Tanggal Lahir </th>
      <th> Shif </th>
    </tr>
    <?php
    foreach($apotek as $apt) : ?>
    <tr align="center">
      <td><?php echo $apt->kode_karyawan ?></td>
      <td><?php echo $apt->nama_karyawan ?></td>
      <td><?php echo $apt->tgl_lhr ?></td>
      <td><?php echo $apt->shif ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body></html>