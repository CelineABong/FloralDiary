<?php
    include("connection.php");

    function insert_user(){
        global $db;

        $query = "INSERT INTO users(name, password, address, phone, email) VALUES ('".$_POST['name']."','".$_POST['password']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['email']."')";
        $result = $db->query($query);
    }

    function get_user_by_username_password(){
        // grab user based on the username and password
        global $db;
        $query = "SELECT * FROM users WHERE name = '".$_POST['username']."' AND password = '".$_POST['password']."'";

        $result = $db->query($query);
        echo json_encode($result->fetchAll());
    }

    function update_name(){
        global $db;
        
        $query = "UPDATE users SET name = '".$_POST['name']."' WHERE id = ".$_POST['id']."";

        $result = $db->query($query);
        echo json_encode("Updated Username!!");
    }

    function update_usernameitems(){
        global $db;
        
        $query = "UPDATE items SET username = '".$_POST['name']."' WHERE user_id = ".$_POST['id']."";

        $result = $db->query($query);
        echo json_encode("Updated Username in Items!!");
    }

    function update_pass(){
        global $db;
        
        $query = "UPDATE users SET password = '".$_POST['password']."' WHERE id = ".$_POST['id']."";

        $result = $db->query($query);
        echo json_encode("Updated Password!!");
    }

    function update_add(){
        global $db;
        
        $query = "UPDATE users SET address = '".$_POST['address']."' WHERE id = ".$_POST['id']."";

        $result = $db->query($query);
        echo json_encode("Updated Address!!");
    }

    function update_phone(){
        global $db;
        
        $query = "UPDATE users SET phone = '".$_POST['phone']."' WHERE id = ".$_POST['id']."";

        $result = $db->query($query);
        echo json_encode("Updated Phone!!");
    }

    function update_email(){
        global $db;
        
        $query = "UPDATE users SET email = '".$_POST['email']."' WHERE id = ".$_POST['id']."";

        $result = $db->query($query);
        echo json_encode("Updated Email!!");
    }


?>