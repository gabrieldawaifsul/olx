<?php
@session_start();
    if(is_null(@$_SESSION['id']))
        header("Location: search.php");

require '../scripts/ribbons.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="../../res/styles/split.css">
</head>
<body>
<?php
head();
?>
<section id="left">
<?php
    $id = $_SESSION["id"];
    $mail = $_SESSION["mail"];
    $nome = $_SESSION["nome"];

if($_SERVER["QUERY_STRING"] != 'edit=true'){
echo <<<PROMPT
    <h1>olá, <span>$nome</span></h1>
    <form action="user.php" type="get">
        <input type="text" name="edit" value="true" style="display: none;">
        <input type="submit" value="editar conta">
    </form>
    <form action="../scripts/userCRUD.php" type="get">
        <input type="text" name="CRUD" value="D" style="display: none;">
        <input type="submit" value="deletar conta">
    </form>
PROMPT;
}else{
echo <<<EDIT
    <form action="../scripts/userCRUD.php" method="post">
        <input type="text" name="CRUD" value="U" style="display: none;">
        <input type="text" name="id" value="$id" style="display: none;">
        <input type="text" name="nome" value="$nome">
        <input type="text" name="mail" value="$mail">
        <input type="password" name="pass">
        <input type="submit" value="editar">
    </form>
EDIT;
}
?>


</section>
<section id="right">
        <p>aqui é onde eu colocaria tipo</p>
        <p>'suas listagems'</p>
        <p>ou alguma outra coisa do gênero</p>
</section>

<?php
foot();
?>
</body>
</html>