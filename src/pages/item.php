<?php require '../scripts/ribbons.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>item</title>
    <link rel="stylesheet" href="../../res/styles/item.css">
</head>
<body>

<?php head();

include("../scripts/conn.php");

# valores query -extracão> variáveis 
$itemQuery = "SELECT * FROM items WHERE id = ".$_SERVER["QUERY_STRING"].";";
$itemResult = mysqli_fetch_assoc(mysqli_query($db, $itemQuery));

$titulo = $itemResult["titulo"];
$uname = $itemResult["uid"];
$descr = $itemResult["descr"];
$preco = $itemResult["preco"];
$qtd = $itemResult["qtd"];

# expressão dos valores no html
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
                    <h1>R$preco</h1>
                    <h3>$qtd disponível(is)</h3>
                    <button onclick="#">comprar</button>
                </div>
            </div>
        </div>
        
</div>

<br>
ITEM;

# área de gerenciamento do item - WIP
# só descobrir como fazer botão.onclick() -> php func
$auth = true;

if($auth){
echo <<<OWNER

OWNER;
}

?>

<div id="admin" class="box">
    <button onclick="edit()">editar</button>
    <button onclick="delt()">deletar</button>
</div>

    <script>
        function edit(){
            <?php
                echo "edit";
            ?>
        }

        function delt(){
            <?php
                echo "delete";
            ?>
        }
    </script>

<?php
    mysqli_close($db);
    foot();
?>
</body>
</html>