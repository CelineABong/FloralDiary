<?php
    include("connect.php");

    function insert_image(){
        global $db;

        $query = "INSERT INTO image (title, path, description, price, userid) VALUES (:title, :path, :description, :price, (SELECT id FROM users WHERE username = :username))";
        $stmt = $db->prepare($query);
        $stmt->execute(array(
            ':path' => $_POST['path'],
            ':price' => $_POST['price'],
            ':description' => $_POST['description'],
            ':username' => $_POST['uploader'],
            ':title' => $_POST['title'],
        ));
        $result = $stmt->rowCount();
        
        echo json_encode($result);
        
    }

    function get_all_images(){
        global $db;
        
        $query = "SELECT image.id, image.title, image.path, image.description,image.price, users.username FROM image INNER JOIN users ON image.userid = users.id ORDER BY id DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $imageDetail = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($imageDetail);
        
    }
    
/*
function get_messages(){
    global $db;
    $query = "SELECT messages.id AS msg_id, messages.message, users.username, messages.user_id, 
                (SELECT COUNT(*) FROM likes WHERE likes.message_id = msg_id) AS likeNum
                FROM messages
                LEFT JOIN users ON users.id = messages.user_id";
    $result = $db->query($query);
    echo json_encode($result->fetchAll());
}
*/

    function get_user_images(){
        global $db;
        
        $query = "SELECT * FROM image WHERE userid = :id ORDER BY id DESC";
        $stmt = $db->prepare($query);
        $stmt->execute(array(
            ':id' => $_POST['id']   
        ));
        $imageDetail = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($imageDetail);
    }

    function get_images(){
        global $db;
        
        $query = "SELECT image.id AS img_id, image.title, image.path, image.description, image.price, users.username, (SELECT COUNT(*) FROM likes WHERE likes.image_id = img_id) AS likeNum
        FROM image
        INNER JOIN users ON image.userid = users.id WHERE image.id = :id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(
            ':id' => $_POST['id']   
        ));
        $imageDetail = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($imageDetail);
    }

    function changeImgInfo(){
    
        global $db;
        
        $col = $_POST['col'];
        
        $query = "UPDATE image SET $col = :value WHERE id = :id";
    
        $stmt = $db->prepare($query);
        $stmt->execute(array(
            ":id"=>$_POST['id'],
            ":value"=>$_POST['value']
        ));
        $result = $stmt->rowCount();
    
        echo json_encode($result);
   }

    function delect_images(){
        
        global $db;
        
        $query = "DELETE FROM image WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(
            ':id' => $_POST['id']   
        ));
        $result = $stmt->rowCount();
        
        echo json_encode($result);
        
        //echo json_encode("ha");
        
    }

//LIKES
    function insert_like(){
        global $db;
        $query = "INSERT INTO likes (image_id, user_id) VALUES ('".$_POST['image_id']."', ".$_POST['user_id'].")";
        $result = $db->query($query);
    }

    function get_likes(){
        global $db;
        $query = "SELECT * FROM likes";
        $result = $db->query($query);
        echo json_encode($result->fetchAll());
    }


?>