<?php
@session_start();
    if(is_null(@$_SESSION['id']))
        header("Location: search.php");
?>