<?php
    include("../mod/usersdb.php");

    if($_POST['method'] == "insert"){
        insert_user();
    }

?>