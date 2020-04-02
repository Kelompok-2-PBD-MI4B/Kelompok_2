<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where  username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek < 1){
	$nama = $_POST['nama'];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$level = $_POST['level'];
	$sql = "insert into user values ('','$nama','$username','$password','$level')";
	$hasil = mysqli_query($koneksi, $sql);
	$_SESSION['status'] = "daftar";
	header("location:daftar.php?pesan=daftar");
}else{
	header("location:daftar.php?pesan=gagal");
}
?>