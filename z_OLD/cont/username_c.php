<?php 
//CONTROLLERS PHP

include("../mod/username.php");

if($_POST['method'] == "insert"){
	insert_username();
}

if($_POST['method'] == "view"){
	view_usernames();
}

//43:51 on video
if($_POST['method'] == "update"){
	update_username();
}

//59:23
if($_POST['method'] == "delete"){
	delete_username();
}

if($_POST['method'] == "login"){
    get_user_by_username_password();
}
//Celine
?>
