<?php
session_start();
require 'functions.php';
$crud=query ("SELECT * FROM crud");

if( !isset($_SESSION['username']) ) {
	header("Location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

	<title>Halaman Administrator</title>
	<style>
		#spinner { display: none; }
		 
		 .navbar-brand {
			font-family:arial;
			 font-size:32;
		 }
		 .nav-link {
			 text-transform: uppercase;
			 margin-right: 30px;
			 font-size: 25;
		 }
		 .nav-link:hover::after {
			 content: '';
			 display:block;
			 border-bottom: 3px solid #0B63DC;
			 width:50%;
			 margin:auto;
			 padding-bottom: 5px;
			 margin-bottom: -8px;
		 }
		 .tombol{
			 text-transform: uppercase;
			 border-radius: 40px;
		 }
		 .jumbotron{
			 background-image: url(img/Samsat-Online-Nasional.jpg);
			 background-size: cover;
			 height: 760px;
			 margin-right:250px;
			 margin-left:250px;
			 
		 }
		  .info-panel{
			  box-shadow: 0 3px 30px rgba(0,0,0,0.5);
			  border-radius: 12px;
			  margin-top:-100px;
			  background-color:white;
		  }
		  .info-panel img{
			  width:80px;
			  height:80px;
			  margin-right:20px;
			  margin-bottom:20px;
		  }
		  .info-panel h4{
			  font-size:16px;
			  text-transform: uppercase;
			  font-weight: bold;
			  margin-top: 5px;
		  }
		  .info-panel p{
			  font-size:14px;
			  colot: #ACACAC;
			  margin-top: -5px;
			  font-weight: 200;
		  }

	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light ">
<div class="container">
  <a class="navbar-brand" href="#">SamsatOnline</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Info</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
	  <a class="nav-item btn btn-primary tombol" href="daftar.php">Daftar</a>
		<a class="nav-item btn btn-danger tombol" href="logout.php">Keluar</a>
      
    </div>
   </div>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
  </div>
</div>

	<div class="container">
		 <div class="row justify-content-center">
		 	<div class="col-lg-10 info-panel">
		  		<div class="row">
		  			<div class="col-lg">
		  				<img src="img/employee.png" alt="Employee" class="float-left">
						  <h4>24 Jam</h4>
						  <p>Pengawasan</p>
					</div>

					<div class="col-lg">
		  				<img src="img/hires.png" alt="High-res" class="float-left">
						  <h4>High-res</h4>
						  <p>Pengecekan</p>
					</div>

					<div class="col-lg">
		  				<img src="img/security.png" alt="Security" class="float-left">
						  <h4>Security</h4>
						  <p>Pengamanan</p>
					</div>
				</div>
			 </div>
		 </div>
	</div>
	<div class="container">
	<table class="table table-bordered">
  <thead>
    <tr>
      <th>No.KTP</th>
      <th>Nama Lengkap</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
	  	<th>No.Telepon</th>
			<th>Aksi</th>
    </tr>

  <?php $i = 1; ?>
	<?php foreach( $crud as $row ) : ?>
	
	<tr>
		<td><?=$i ?></td>
		<td><?= $row["no_ktp"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["jenis_kelamin"]; ?></td>
		<td><?= $row["alamat"]; ?></td>
		<td><?= $row["no_telp"]; ?></td>
		
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-succes">Ubah</a>
			<a href="hapus.php?id=<?= $row["id"]; ?>" class="btn-danger btn"onclick="return confirm('Apakah Data Ini Akan dihapus?');">Hapus</a>
		</td>

		<?php $i++ ?>

	<?php endforeach; ?>

</table>
</div>
</body>
</html>