<?php 
require 'functions.php';
if( isset($_POST["register"]) ) {
	if( register($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan, silahkan login!');
				document.location.href = 'login.php';
			  </script>";
	} else {
		echo "<script>
				alert('gagal menambahkan user baru!');
				document.location.href = 'login.php';
			  </script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrasi User</title>
	<style>
	 width: 100%;
  max-width: 400px;
  margin: auto;
}
body {
	font-family:arial;
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
	<h3>Registrasi User</h3>

	<div class="form-container">
  		<form action="" method="post">
  			<div class="img-container">
	   			<h1>Silahkan Daftar</h1>
  			</div>

  		<div class="container">
   			<label for="username">Nama Pengguna</label>
    		<input type="text" name="username" id="username" placeholder="Masukkan Nama Pengguna"  autofocus>

  			 <label for="password">Kata Sandi</label>
    		<input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi" >

   			<label for="email"> Email</label>
    		<input type="text" name="email" id="email" requred>

			<button type="submit" name="register">Daftar</button>
	  </div>
	 </form>
 </div>


</body>
</html>