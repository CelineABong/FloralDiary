<?php 
include("connection.php");

function insert_username(){
	global $db;
	$query = "INSERT INTO usernames(username) VALUES ('".$_POST['username']."')";
	$result = $db -> query($query);
}

function view_usernames(){
	global $db;
	$query = "SELECT * FROM usernames";
	$result = $db->query($query);
	echo json_encode($result->fetchAll());

}

function update_username(){
//update the passwords
global $db;
//from data: method update on main.html...
$query = "UPDATE usernames SET username = '".$_POST['username']."' WHERE id = ".$_POST['id']."";

$result = $db->query($query);
echo json_encode("Updated Username!!");
}

//1:00:20
function delete_username(){
//delete the passwords
global $db;
$query = "DELETE FROM usernames WHERE id = ".$_POST['id']."";
$result = $db->query($query);
echo json_encode("DELETED USERNAME!");
}


function get_user_by_username_password(){
    // grab user based on the username and password
    global $db;
    $query = "SELECT id FROM users WHERE name = '".$_POST['username']."' AND password = '".$_POST['password']."'";
    
    $result = $db->query($query);
    echo json_encode($result->fetchAll());
}
?>
