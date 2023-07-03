<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit();
} else {
    // Lanjutkan dengan tampilan dashboard
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AsalJualan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header--->
	<header>
		<div class="container">
			<h1><a href="">Hewan Kita</a></h1>
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
			<h3>Dashbord</h3>
			<div class="box">
				<h4></h4>Selamat datang <?php echo $_SESSION['a_global']->admin_name ?> di Toko Hewan Kita</h4>
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