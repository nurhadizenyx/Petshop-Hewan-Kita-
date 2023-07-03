
<?php
	session_start();
	include'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hewan Kita</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header--->
	<header>
		<div class="container">
			<h1><a href="">Hewan Kita<a/></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>
	<!-- komtem-->
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">
				<p><a href="tambah-produk.php">Tambah Data</a></p>
				<table border="1" cellspacing="0" class="tabel">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Status</th>
							<th width="125px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM tb_produk LEFT JOIN tb_kategori USING(kategori_id) ORDER BY produk_id DESC");
                            if(mysqli_num_rows($produk) > 0){
							while ($row = mysqli_fetch_array($produk)) {
							
						?>
						<tr>
							<td><?php echo $no ++ ?></td>
							<td><?php echo $row ['kategori_name']?></td>
                            <td><?php echo $row ['produk_name']?></td>
                            <td>Rp. <?php echo number_format($row ['produk_price'])?></td>
                            <td><a href="produk/<?php echo $row ['produk_image']?>" target="_blank" ><img src="produk/<?php echo $row ['produk_image']?>" width="50px"></a></td>
                            <td><?php echo ($row ['produk_status'] == 0 )? 'Tidak Aktif':'Aktif'; ?></td>
							<td>
								<a href="edit-produk.php?id=<?php echo $row['produk_id'] ?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['produk_id'] ?>" onclick="return confirm('Yakin Anda Ingin Menghapus?')">Hapus</a>
							</td>

						</tr>
						<?php }}else{ ?>
                            <tr>
                                <td colspan="7">Tidak Ada Data</td>
                            </tr>
                        <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!---Foter--->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2023 - Hewan Kita</small>
		</div>
	</footer>
</body>
</html>