<?php 
session_start();


// hapus cookie
setcookie('id', '', time() - 3600);
setcookie('hash', '', time() - 3600);

header("Location: login.php");
session_destroy();
exit;
?>