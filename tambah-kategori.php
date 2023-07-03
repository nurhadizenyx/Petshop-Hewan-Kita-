<?php
	session_start();
	include'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}


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
			<h3>Tambah Kategori</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input-control" "  required>
					<input type="submit" name="submit" value="Submit" class="btn" >
				</form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);

                        $insert = mysqli_query($conn, "INSERT INTO tb_kategori VALUES(   
                                  null,
                                   '".$nama."' ) ");
                        if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
						    echo '<script>window.location="data-kategori.php"</script>';
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }
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
</body>
</html>