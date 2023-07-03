<?php
	session_start();
	include'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
    }

    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hewan Kita</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
</head>
<body>
	<!-- header--->
	<header>
		<div class="container">
			<h1><a href="">Hewan Kita<a></h1>
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
			<h3>Edit Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php
                            $kategori = mysqli_query($conn,"SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['kategori_id'] ?>" <?php echo ($r['kategori_id'] == $p->kategori_id) ? 'selected="selected"' : '' ?>><?php echo $r['kategori_name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->produk_name ?>" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->produk_price ?>" required>

                    <img src="produk/<?php echo $p->produk_image ?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $p->produk_image ?>">


                    <input type="file" name="gambar" class="input-control">
                    <textarea class="input-control" name="deskripsi" placeholder="diskripsi"><?php echo $p->produk_diskripsi ?></textarea><br>
                    <select class="input-control" name="status">
                        <option value="" >--Pilih--</option>
                        <option value="1" <?php echo ($p->produk_status == 1)? 'selected':''; ?>>Aktif</option>
                        <option value="0" <?php echo ($p->produk_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
                        
                    </select>
					<input type="submit" name="submit" value="Submit" class="btn" >
				</form>
                <?php
                    if(isset($_POST['submit'])){
                        
                        // manampung input data dari form
                        $kategori    = $_POST['kategori'];
                        $nama        = $_POST['nama'];
                        $harga       = $_POST['harga'];
                        $deskripsi   = $_POST['deskripsi'];
                        $status      = $_POST['status'];
                        $foto        = $_POST['foto'];
                        
                        // menampung data gambar yang diupload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];
 
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
 
                        $newname = 'produk'.time().'.'.$type2;
                            // menampung data format file yang diizinkan
                        $tipe_diijinkan = array('jpg', 'jpeg', 'png', 'gif');
 
                        // admin ganti gamabar
                        if($filename != ''){

                            if(!in_array($type2, $tipe_diijinkan)){

                                echo '<script>alert("Format File Tidak Di Ijinkan")</script>';
                               }else{
                                unlink('./produk/'.$foto);
                                move_uploaded_file($tmp_name, './produk/'.$newname);
                                $namagambar = $newname;
                               }

                        }else{
                            //jika admin tidak ganri gambar
                            $namagambar = $foto;

                        }

                        // quwry update data produk
                        $update = mysqli_query($conn, "UPDATE tb_produk SET kategori_id = '".$kategori."',
                                                                            produk_name = '".$nama."',
                                                                            produk_price = '".$harga."',
                                                                            produk_diskripsi = '".$deskripsi."',
                                                                            produk_image = '".$namagambar."',
                                                                            produk_status = '".$status."'
                                                                            WHERE produk_id = '".$p->produk_id."' ");
                        if($update){
                         echo '<script>alert("Ubah data berhasil")</script>';
                         echo '<script>window.location="data-produk.php"</script>';
                        }else{
                        echo 'Simpan data gagal'.mysqli_error($conn);
                        }
                   
					 

                       
						

                        // validasi format file 
 
                        // proses uplod file sekaligus inset ke database
 
 
                     }
                ?>
				
			</div>

			</div>
		</div>
	</div>
	<!---Foter--->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2023 - Hewan Kita</small>
		</div>
	</footer>
	<script>
         CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>