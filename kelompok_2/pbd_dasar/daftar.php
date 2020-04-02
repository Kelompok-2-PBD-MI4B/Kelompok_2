<html>
<head>
	<title>KELOMPOK 2</title>
	<link rel="stylesheet" type="text/css" href="css/csslogin.css">
</head>
<body>
	<br/>
	<br/>
	<center><h2 style="font-size: 23px;line-height: 2;letter-spacing: 0.6em;">DAFTAR AKUN APLIKASI AKREDITASI PROGRAM STUDI</h2></center>	
	
<div class ="peringat">
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Mendaftar gagal! silahkan ganti username atau password!";}
		
		else if($_GET['pesan'] == "daftar"){
			echo "Akun Anda telah berhasil Terdaftar  Silahkan Login dengan username dan password anda";
		}
	}
	?>
</div>

	<div class="kotak_login">
	<br/>
	<p class="tulisan_login">Daftar Akun</p>
		<form action="daftar_akun.php" method="post" onSubmit="return validasi()">
			<div>
				<label>Nama:</label>
				<input type="text" name="nama" class="form_login" id="nama" placeholder="Nama .."/>
			</div>
			<div>
				<label>Username:</label>
				<input type="text" name="username" class="form_login" id="username" placeholder="Username .." />
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" class="form_login" id="password" placeholder="Password .."/>
			</div>	
			<div>
				<label>Sebagai</label><br>
				<label><input type="radio" name="level" id="level" value="admin">Admin</label>
				<label><input type="radio" name="level" id="level" value="user">User</label>
			</div>		
			<div>
				<input type="submit" value="Daftar" class="tombol_login">
			</div>
		</form>
		<a href="login.php"><button class="tombol_login">kembali</button></a> 
	</div>

</body>
 
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {	
			return true;
		}else{
			alert('Username dan Password harus diisi!');
			return false;
		}
	}
 
</script>
</html>