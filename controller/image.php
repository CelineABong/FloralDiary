<?php

    include("../model/imagedb.php");

    if($_POST['method'] == "insert"){
        insert_image();
    }

    if($_POST['method'] == "getAll"){
        get_all_images();
    }

    if($_POST['method'] == "getImage"){
        get_images();
    }

    if($_POST['method'] == "getUserImage"){
         get_user_images();
    }

    if($_POST['method'] == "updateImage"){
        changeImgInfo();
    }

    if($_POST['method'] == "del"){
        //echo json_encode("ha");
        delect_images();
    }

?>