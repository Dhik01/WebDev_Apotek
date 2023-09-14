<!DOCTYPE html>
<html><head>
  <title> PDF - Data Penjualan </title>
</head><body>
  <center><h1> Data Penjualan </h1></center>
  <table border="0.5" style="margin-left: auto; margin-right: auto;">
    <tr align="center">
      <th> Kode Transaksi </th>
      <th> Nama Obat </th>
      <th> Tanggal Transaksi </th>
      <th> Metode Bayar </th>
      <th> Jumlah Beli </th>
      <th> Nama Pelayan </th>
      <th> Nama Penerima </th>
      <th> Total Bayar </th>
    </tr>
    <?php
    foreach($apotek as $apt) : ?>
    <tr align="center">
      <td><?php echo $apt->kode_trans ?></td>
      <td><?php echo $apt->nama_obat ?></td>
      <td><?php echo $apt->tgl_trans ?></td>
      <td><?php echo $apt->metode_bayar ?></td>
      <td><?php echo $apt->jumlah_beli ?></td>
      <td><?php echo $apt->nama_pelayan ?></td>
      <td><?php echo $apt->nama_penerima ?></td>
      <td><?php echo $apt->total_bayar ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body></html>