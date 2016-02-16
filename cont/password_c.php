<?php 
//CONTROLLERS PHP

include("../mod/password.php");

if($_POST['method'] == "insert"){
	insert_password();
}

if($_POST['method'] == "view"){
	view_passwords();
}

//43:51 on video
if($_POST['method'] == "update"){
	update_password();
}

//59:23
if($_POST['method'] == "delete"){
	delete_password();
}
?>
