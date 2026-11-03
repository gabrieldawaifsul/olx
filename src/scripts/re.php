<?php
@session_start();
    if(is_null(@$_SESSION['id'])){
        header("Location: ../../index.php");
    }else{
        header("Location: ../pages/user.php");
    }
?>