<?php

    $images = $_FILES['file']['tmp_name'];
    $UpName = $_POST['username'];
    $NewName = "image/".$UpName."/".time().".jpg";

    if(!is_dir("image/".$UpName)){
        mkdir("image/".$UpName);
    }
    if(move_uploaded_file($images,$NewName)){
        echo json_encode(array("path"=>"./model/" . $NewName));
    }

?>