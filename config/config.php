<?php
$host='localhost';
$username='root';
$password='';
$db='book_shop';
$con=mysqli_connect($host,$username,$password,$db);
if(!$con){
	echo "<h1>Database not connected properly <h1>";
}
?>