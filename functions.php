<?php
$conn = mysqli_connect("localhost", "root", "","web" );

	
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);

	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}
function daftar($data) {
	global $conn;

	$no_ktp			 = htmlspecialchars($data["no_ktp"]);
	$nama 			 = htmlspecialchars($data["nama"]);
	$jenis_kelamin   = htmlspecialchars($data["jenis_kelamin"]);
	$alamat 		 = htmlspecialchars($data["alamat"]);
	$no_telp		 = htmlspecialchars($data["no_telp"]);
	

	$query = "INSERT INTO crud 
				VALUES 
				('', '$no_ktp', '$nama', '$jenis_kelamin', '$alamat', '$no_telp',
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM crud WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	$id = $data["id"];
	$no_ktp			 = htmlspecialchars($data["no_ktp"]);
	$nama 			 = htmlspecialchars($data["nama"]);
	$jenis_kelamin   = htmlspecialchars($data["jenis_kelamin"]);
	$alamat 		 = htmlspecialchars($data["alamat"]);
	$no_telp		 = htmlspecialchars($data["no_telp"]);
	

	$query = "UPDATE crud SET
				no_ktp = '$no_ktp',
				nama = '$nama',
				jenis_kelamin = '$jenis_kelamin',
				alamat = '$alamat',
				no_telp = '$no_telp',
				
				WHERE id = $id 
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function register($data) {
	global $conn;

	$username = htmlspecialchars($_POST["username"]);
	$password = htmlspecialchars($_POST["password"]);
	$email = htmlspecialchars($_POST["email"]);

	// cek username sudah pernah ada atau belum
	$cek_username = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_num_rows($cek_username) === 1 ) {
		echo "<script>
				alert('username sudah terpakai!');
				document.location.href = '';
			  </script>";
		return false;
	}

	// tambahkan user baru ke database
	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// insert ke DB
	$sql = "INSERT INTO user VALUES ('', '$username', '$password', '$email')";
	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


















?>