<?php 
//CONTROLLERS PHP

include("../mod/image.php");

if($_POST['method'] == "insert"){
	insert_image();
}

if($_POST['method'] == "view"){
	view_images();
}

//43:51 on video
if($_POST['method'] == "update"){
	update_image();
}

//59:23
if($_POST['method'] == "delete"){
	delete_image();
}
?>
