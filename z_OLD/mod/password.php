<?php 
include("connection.php");

//Create of the CRUD
function insert_password(){
	global $db;
	//$query = "INSERT INTO passwords(password) VALUES ('test')";
	$query = "INSERT INTO passwords(password) VALUES ('".$_POST['password']."')";
	$result = $db -> query($query);
}

//READ of the CRUD for the server
function view_passwords(){
	global $db;
	$query = "SELECT * FROM passwords";
	$result = $db->query($query);
	echo json_encode($result->fetchAll());

}

function update_password(){
//update the passwords
global $db;
//from data: method update on main.html...
$query = "UPDATE passwords SET password = '".$_POST['password']."' WHERE id = ".$_POST['id']."";

$result = $db->query($query);
echo json_encode("Updated!!");
}

//1:00:20
function delete_password(){
//delete the passwords
global $db;
$query = "DELETE FROM passwords WHERE id = ".$_POST['id']."";
$result = $db->query($query);
echo json_encode("DELETED!");
}






?>
