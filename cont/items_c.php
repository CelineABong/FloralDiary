<?php 
//CONTROLLERS PHP

include("../mod/items.php");

if($_POST['method'] == "insert"){
	insert_item();
}

if($_POST['method'] == "view"){
	view_items();
}

//43:51 on video
if($_POST['method'] == "update"){
	update_item();
}

//59:23
if($_POST['method'] == "delete"){
	delete_item();
}
//Celine
?>
