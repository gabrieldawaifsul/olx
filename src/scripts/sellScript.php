<?php
require 'conn.php';

$tit = $_POST["tit"];
$prc = $_POST["prc"];
$qtd = $_POST["qtd"];
$dsc = $_POST["dsc"];
$cat = $_POST["cat"];
$user = 1;

$query = "INSERT INTO items(uid, preco, qtd, titulo, descr)
          VALUES($user,$prc,$qtd,'$tit','$dsc');";

try{
    mysqli_query($db, $query);
    echo 'Sucesso <br>';
}catch(mysqli_sql_exception){
    echo 'Falha <br>';
}
    echo '<a href="../pages/search.php">voltar para pesquisas</a>';

mysqli_close($db);
?>

