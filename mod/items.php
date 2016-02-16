<?php 
include("connection.php");

function insert_item(){
	global $db;
	$query = "INSERT INTO items(name, description, price) VALUES ('".$_POST['itemname']."','".$_POST['itemdes']."','".$_POST['itemprice']."')";
	$result = $db -> query($query);
}

function view_items(){
	global $db;
	$query = "SELECT * FROM items";
	$result = $db->query($query);
	echo json_encode($result->fetchAll());

}

function update_item(){
//update the passwords
global $db;
//from data: method update on main.html...
//$query = "UPDATE items SET name = '".$_POST['itemname']."', description = '".$_POST['itemdes']."', price = '".$_POST['itemprice']."' WHERE id = ".$_POST['id']."";
$query = "UPDATE items SET description = '".$_POST['itemdes']."' WHERE id = ".$_POST['id']."";

$result = $db->query($query);
echo json_encode("Updated Item Name!!");
}

//1:00:20
function delete_item(){
 
global $db;
$query = "DELETE FROM items WHERE id = ".$_POST['id']."";
$result = $db->query($query);
echo json_encode("DELETED ITEM!");
}
?>
