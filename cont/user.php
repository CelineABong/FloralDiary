<?php
    include("../mod/usersdb.php");

    if($_POST['method'] == "insert"){
        insert_user();
    }

    if($_POST['method'] == "updateUser"){
        update_name();
        update_pass();
        update_add();
        update_phone();
        update_email();
    }


?>