<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>item</title>
    <link rel="stylesheet" href="../../res/styles/item.css">
</head>
<body>

<?php 

#header
require '../scripts/ribbons.php';
head();

#pega o item no url e distribui as variáveis
require '../scripts/itemCRUD.php';
$id = $_SERVER["QUERY_STRING"];
$item = $result[$id];
$titulo = $item["titulo"];
$uname  = $item["uid"];
$descr  = $item["descr"];
$preco  = $item["preco"];
$qtd    = $item["qtd"];


echo <<<ITEM
<div id="main" class="box">
        <div style="flex-direction: row;">
            <div style="flex-direction:row">
                <div style="flex-direction: column;">
                    <h1>$titulo</h1>
                    <h3>vendido por $uname</h3>
                    <p>$descr</p>
                </div>
                <div style="flex-direction: column; align-items: end;">
                    <h1>R\$$preco</h1>
                    <h3>$qtd disponível(is)</h3>
                    <button onclick="#">comprar</button>
                </div>
            </div>
        </div>
        
</div>

<br>
ITEM;

# AUTENTICAÇÂO DE USUÀRIO
# área de gerenciamento do item - WIP
$auth = true;

if($auth){
echo <<<OWNER
<div id="admin" class="box">
    <button><form action="../scripts/itemCRUD.php" method="post">
        <input style="display: none" type="text" name="id" value=$id>
        <input style="display: none" type="text" name="CRUD" value='U'>
        <input type="submit" value="editar"></form>
    </button>
    <button><form action="../scripts/itemCRUD.php" method="post">
        <input style="display: none" type="text" name="id" value=$id>
        <input style="display: none" type="text" name="CRUD" value='D'>
        <input type="submit" value="deletar"></form>
    </button>
</div>
OWNER;
}

    foot();
?>
</body>
</html>