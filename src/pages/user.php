<?php
@session_start();
    if(is_null(@$_SESSION['id']))
        header("Location: search.php");

require '../scripts/ribbons.php';
require '../scripts/conn.php';
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
foot();
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
echo '</section>
    <section id="right">
    <h2>seu carrinho</h2>';

try{
    $result = query_result_getter(
        mysqli_query($db,
            "SELECT * FROM items WHERE id IN (SELECT iid FROM carrinhos WHERE uid = $id);"
        ),'items'
    ); 

    if($result == null) throw new Exception('404');

    foreach($result as $row){
        echo <<<CARTCARD
            <ul class="cartcard">
                <li><a href="item.php?{$row['id']}">{$row['titulo']}</a></li>
                <li>R\${$row['preco']}</li>
                <li><a href="../scripts/cartCRUD.php?{$row['id']}">X</a></li>
            </ul>
        CARTCARD;
    }

}catch(Exception $e){
    echo '<h4>você não tem nada no seu carrinho</h4>';
    echo '<a href="search.php">>adicione alguma coisa</a>';
}

echo '</section></body></html>';
?>