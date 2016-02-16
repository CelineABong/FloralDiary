<?php

include("connect.php");

function insert_message(){

    global $db;
    $query = "INSERT INTO comments (comment, user_id) VALUES ('".$_POST['comment']."', '".$_POST['user_id']."')";
    
    //this is hard coded
    //$query = "INSERT INTO images (title, user_id, path) VALUES ('testTitle', 1, 'https://images.pinkcakebox.com/cake2072-cover.jpg')";
        
     $result = $db->query($query);

}
    
//THIS SHOWS ALL MESSAGES
function get_messages(){
    global $db;
    
    $query = "SELECT messages.id AS msg_id, messages.message, users.username, images.path, messages.user_id, 
                (SELECT COUNT(*) FROM likes WHERE likes.message_id = msg_id) AS likeNum
              FROM messages, users, images
              WHERE users.id = messages.user_id AND users.id = images.user_id";
    
    $result = $db->query($query);
    echo json_encode($result-> fetchAll());
    
}


function update_message(){
  
    
}


function delete_message(){
   
    
}


function insert_like(){

    global $db;
    $query = "INSERT INTO likes (user_id, message_id) VALUES ('".$_POST['user_id']."', '".$_POST['message_id']."')";
     
    $result = $db->query($query);

}


function get_likes(){
    global $db;
    
    $query = "SELECT * FROM likes";
    
    $result = $db->query($query);
    echo json_encode($result-> fetchAll());
    
}

    
?>