<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Print - Data Obat </title>
</head>
<body>
	<center><h1> Data Obat </h1></center>
	<table border="1" style="margin-left: auto; margin-right: auto;"> 
		<tr align="center">
            <th> Kode Obat </th>
            <th> Nama Obat </th>
            <th> Jenis </th>
            <th> Harga </th>
            <th> Expired </th>
		</tr>
	    <?php
	    foreach ($apotek as $apt){?>
	    <tr align="center">
	        <td><?php echo $apt->kode_obat ?></td>
	        <td><?php echo $apt->nama_obat ?></td>
	        <td><?php echo $apt->jenis ?></td>
	        <td><?php echo $apt->harga ?></td>
	        <td><?php echo $apt->expired ?></td>
		</tr> 
		<?php 
			}; 
		?> 
	</table> 
	<!-- script dibawah ini untuk menampilkan jendela print --> 
	<script type="text/javascript"> window.print() </script>
</body> 
</html>