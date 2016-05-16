<?php 
try {

$db = new PDO("mysql:dbname=floraldiary; host=localhost", "root", "root");

} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}


?>
