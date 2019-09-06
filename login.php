<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['hash']) ) {
	$id = $_COOKIE['id'];
	$hash = $_COOKIE['hash'];

	// cek username berdasarkan id
	$result = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $id");
	$row = mysqli_fetch_assoc($result);

	if( $hash === hash('sha256', $row['username'], false) ) {
		// set session
		$_SESSION['username'] = $row['username'];
		// masuk ke halaman index
		header('Location: index.php');
		exit;
	}


}

// cek session
if( isset($_SESSION['username']) ) {
	header("Location: index.php");
	exit;
}

// jika tombol login ditekan
if( isset($_POST['login']) ) {

	// cek login
	// cek usernamenya dulu
	global $conn;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cek_username = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_num_rows($cek_username) === 1 ) {
		$row = mysqli_fetch_assoc($cek_username);
		// cek password
		if( password_verify($password, $row['password']) ) {
			// jika berhasil login
			$_SESSION['username'] = $_POST['username'];

			// jika remember di ceklis
			if( isset($_POST['remember']) ) {
				// buat cookie
					setcookie('id', $row['user_id'], time() + 60 * 60 * 24);
				$hash = hash('sha256', $row['username'], false);
				setcookie('hash', $hash, time() + 60 * 60 * 24);
			}

			header('Location: index.php');
			exit;
		}
	}
	
	$error = true;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

	<title>Halaman Login</title>
	<style>
		ul li { list-style-type: none; }
		.form-container{
  width: 100%;
  max-width: 400px;
  margin: auto;
}

form{
      box-shadow: 0px 5px 25px -5px #999;
}
input[type=text], input[type=password]{
  width: 100%;
  margin: 10px 0;
  padding: 12px 20px;
  box-sizing: border-box;
}
button{
  background: #2374fc;
  color: #fff;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  width: 100%;
  cursor: pointer;
}
.btn-cancle{
  width: auto;
  padding: 10px 18px;
  background-color: #f93333;
}
.img-container{
  text-align: center;
  margin: 24px 0 12px 0;
  padding: 15px 0;
}
img.avatar{
  width: 40%;
  border-radius: 50%;
}
.container{
  padding: 16px;
}
	</style>
</head>
<body>
	
	<?php if( isset($error) ) : ?>
		<p style="color: red; font-style: italic;">username / password salah!</p>
	<?php endif; ?>

	<div class="form-container">
  		<form action="" method="post">
  			<div class="img-container">
	   			<h1>Silahkan Masuk</h1>
  			</div>

  		<div class="container">
   			<label for="username">Nama Pengguna</label>
    		<input type="text" name="username" id="username" placeholder="Masukkan Nama Pengguna"  autofocus>

  			 <label for="password">Kata Sandi</label>
    		<input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi" >

   			<label for="remember"><input type="checkbox"> Ingat Saya</label>
			   
    		<button type="submit" name="login">Masuk</button>
	  </div>
	 </form>
 </div>

</body>
</html>