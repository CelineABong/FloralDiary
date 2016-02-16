<?php
include("../mod/comments.php");

if($_POST['method'] == "insert"){
    insert_message();
    
}

if($_POST['method'] == "getall"){
    get_messages();
    
}

if($_POST['method'] == "like"){
    insert_like();
    
}

?>