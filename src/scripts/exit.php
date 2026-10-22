<?php
    session_start();
    session_destroy(); // destrói a sessão
    header("Location: signin.php"); // é redirecionada para a páginalogin.php
    exit;
?>