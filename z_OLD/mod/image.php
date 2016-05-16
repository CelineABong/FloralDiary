<?php 
include("connection.php");

//Create of the CRUD
function insert_image(){
	global $db;
	$query = "INSERT INTO images(image) VALUES ('".$_POST['image']."')";
	$result = $db -> query($query);
}

//READ of the CRUD for the server
function view_images(){
	global $db;
	$query = "SELECT * FROM images";
	$result = $db->query($query);
	echo json_encode($result->fetchAll());

}

function update_image(){
//update the passwords
global $db;
//from data: method update on main.html...
$query = "UPDATE images SET password = '".$_POST['image']."' WHERE id = ".$_POST['id']."";

$result = $db->query($query);
echo json_encode("Updated!!");
}

//1:00:20
function delete_image(){

global $db;
$query = "DELETE FROM images WHERE id = ".$_POST['id']."";
$result = $db->query($query);
echo json_encode("DELETED!");
}






?>
