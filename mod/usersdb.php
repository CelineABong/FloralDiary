<?php
    include("connection.php");

    function insert_user(){
        global $db;

        $query = "INSERT INTO users(name, password, address, phone, email) VALUES ('".$_POST['name']."','".$_POST['password']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['email']."')";
        $result = $db->query($query);
    }

?>