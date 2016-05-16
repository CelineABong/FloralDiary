<?php

    include("../model/commentdb.php");

    if($_POST['method'] == "insert"){
        insert_comment();
    }

    if($_POST['method'] == "getall"){
        get_comment();
    }

    if($_POST['method'] == "getImgComm"){
        get_imgComment();
    }
    
    if($_POST['method'] == "getUserComm"){
        get_userComment();
    }

    if($_POST['method'] == "delectComment"){
        delect_comment();
    }


?>