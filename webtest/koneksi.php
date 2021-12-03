<?php 
$konesi = mysqli_connect("localhost","root","","dbfriend-finder");
 if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>