<?php

    var_dump($_POST);
    var_dump($_FILES);
    
    if(!is_dir("../img/".$_POST['userid']."/")){
        mkdir("../img/".$_POST['userid'], 0775);
    }

    $filename = substr(md5(rand()), 0, 7);
    if(move_uploaded_file($_FILES["images"]["tmp_name"][0], "../img/1/".$filename.".jpg")){
    }
    
?>