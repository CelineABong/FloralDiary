<?php
    include("connect.php");

    function get_imgComment(){
        global $db;
        $query = "SELECT users.username, comment.text FROM comment INNER JOIN users ON comment.userid = users.id WHERE comment.imageid = :id";
        $stmt = $db->prepare($query);
        $stmt->execute(array('id'=>$_POST['imageid']));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        
    }

    function get_userComment(){
        global $db;
        $query = "SELECT comment.imageid, image.title, comment.text FROM comment INNER JOIN image ON image.id = comment.imageid WHERE comment.userid = :id";
        $stmt = $db->prepare($query);
        $stmt->execute(array('id'=>$_POST['userid']));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        
    }

    function insert_comment(){
        global $db;
        $query = "INSERT INTO comment (userid, imageid, text) VALUES (? , ?, ?)";
        $stmt = $db->prepare($query);
        $result = $stmt->execute(array($_POST['userid'], $_POST['imageid'], $_POST['text']));
        echo json_encode($result);
    }

    function update_comment(){
        global $db;
        
        $query = "UPDATE comment SET text = :text WHERE id = :id";
        
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=>$_POST['id'],":text"=>$_POST['newComment']));
        $result = $stmt->rowCount();
    
        echo json_encode($result);
    }

    function delete_comment(){
        global $db;
        
        $query = "DELETE FROM comment WHERE userid = :uid AND imageid = :imgid AND text = :text";
        $stmt = $db->prepare($query);
        $stmt->execute(array(
            ':uid' => $_POST['userid'],
            ':imgid' => $_POST['imageid'],
            ':text' => $_POST['text']
        ));
        $result = $stmt->rowCount();
        
        echo json_encode($result);
        //echo "what?";
    }

?>