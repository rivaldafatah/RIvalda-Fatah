<?php
require 'functions.php';

//ambil data dar iurl
$id = $_GET["id"];
// query data siswa berdasarkan id

$mhs = query("SELECT * FROM crud WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo"
			<script>
				alert('Data Berhasil Diedit');
				document.location.href = 'index.php';
			</script>
			";
	} else {
		echo"
		<script>
			alert('Data Gagal Ditambahkan');
			document.location.href = 'index.php';
			</script>
			";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
body{
    font-family: arial;
}
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
<body>
<div class="form-container">
  		<form action="" method="post">
  			<div class="img-container">
	   			<h1>Silahkan Ubah Data Anda</h1>
  			</div>

  		<div class="container">
   			<label for="no_ktp">No.KTP</label>
    		<input type="text" name="no_ktp" id="no_ktp" required values="<? $mhs["no_ktp"]; ?>" placeholder="Masukkan No.KTP">

  			 <label for="nama">Nama Lengkap</label>
    		<input type="text" name="nama" id="nama" required values="<? $mhs["nama"]; ?>"placeholder="Masukkan Nama Lengkap" >

            <label for="jenis_kelamin">Jenis Kelamin</label>
    		<input type="text">
			   
            <label for="alamat">Alamat</label>
    		<input type="text" name="alamat" id="alamat" required values="<? $mhs["alamat"]; ?>" placeholder="Masukkan Alamat Lengkap" >

            <label for="no_telp">No.Telepon</label>
    		<input type="text" name="no_telp" id="no_telp" required values="<? $mhs["no_telp"]; ?>"placeholder="Masukkan No.Telepon" >

    		<button type="submit" values="submit" name="submit">Daftar</button>
            
	  </div>
	 </form>
 </div>
</body>
</html>