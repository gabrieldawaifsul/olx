<?php
    @session_start();
    session_destroy(); // destrói a sessão
    header("Location: ../../index.php"); // é redirecionada para a páginalogin.php
    exit;
?>