<?php

    include("connect.php");

    function insert_user(){

        global $db;

        $query = "INSERT INTO users(username, password, address, phone, email) VALUES ('".$_POST['username']."','".$_POST['password']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['email']."')";
        
        $result = $db->query($query);
        
    }

    function get_user_by_username_password(){

        global $db;

        $query = "SELECT id, username FROM users WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";

        $result = $db->query($query);
        $userExist = $result->rowCount();
        if($userExist == 1){
             echo json_encode(array("status"=>"success","userInfo" =>$result->fetchAll()));
            
        }else{
            echo json_encode(array("status"=>"failed","msg" =>"wrong password or username"));
        }
       
    }

    function changePass(){
    
        global $db;
        
        $query = "UPDATE users SET password = :password WHERE id = :id";
    
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=>$_POST['id'],":password"=>$_POST['newPass']));
        $result = $stmt->rowCount();
    
        echo json_encode($result);
   }

function update_name(){
        global $db;
        
        $query = "UPDATE users SET username = :username WHERE id = :id";
    
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=>$_POST['id'],":username"=>$_POST['name']));
        $result = $stmt->rowCount();
    
        echo json_encode($result);

    }

  /*  function update_usernameitems(){
        global $db;
        
        $query = "UPDATE items SET username = '".$_POST['name']."' WHERE user_id = ".$_POST['id']."";

        $result = $db->query($query);
        echo json_encode("Updated Username in Items!!");
    } */

 

    function update_add(){
        global $db;
        
        $query = "UPDATE users SET address = :address WHERE id = :id";
    
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=>$_POST['id'],":address"=>$_POST['address']));
        $result = $stmt->rowCount();
    
        echo json_encode($result);
        
    }

    function update_phone(){
        global $db;
        
        $query = "UPDATE users SET phone = :phone WHERE id = :id";
    
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=>$_POST['id'],":phone"=>$_POST['phone']));
        $result = $stmt->rowCount();
    
        echo json_encode($result);

    }

    function update_email(){
        global $db;
        
        $query = "UPDATE users SET email = :email WHERE id = :id";
    
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=>$_POST['id'],":email"=>$_POST['email']));
        $result = $stmt->rowCount();
    
        echo json_encode($result);

    }

?>