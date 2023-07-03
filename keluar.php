<?php
session_start(); // Memulai sesi

// Menghapus semua data sesi
session_unset();
// Menghancurkan sesi
session_destroy();

// Mengarahkan pengguna ke halaman login atau halaman lain yang diinginkan setelah logout
header("Location: login.php");
exit;
?>
