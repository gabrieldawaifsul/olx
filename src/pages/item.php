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
require '../scripts/conn.php';

#descobre o ID por superglobal
$id = isset($_POST["id"]) ? $_POST["id"]: $_SERVER["QUERY_STRING"];

# ADICIONAR HANDLER PRA ITEM NÃO ENCONTRADO
#pega o item da query relacionada ao id
$item = fata(
            mysqli_fetch_assoc(
                              mysqli_query(
                                            $db,"SELECT * FROM items WHERE id = $id;"
                                            )
                              ),
            'items'
            );

#decide se o item vai ser só visível ou editável
if (isset($_POST["mode"]) && $_POST["mode"] == 'edit'){
    #safeguard on nosy by auth
    echo <<<EDIT
        <div class="box" style="flex-flow: column; width: 50%;">
            <h1>edite essa<br>sua listagem</h1>
        <form action="../scripts/itemCRUD.php" method="post">
            <input style="display: none;" type="text" name="CRUD" value='U'>
            <input style="display: none;" type="text" name="id" value='{$id}'>
            <input style="display: none;" type="text" name="uid" value='{$item['uid']}'>
            <input required maxlength=64 type="text" name="titulo" value="{$item['titulo']}">
            <input required maxlength=1024 type="text" name="descr" value="{$item['descr']}">
            <input required min=0 type="number" name="preco" value="{$item['preco']}">
            <input required min=1 type="number" name="qtd" value="{$item['qtd']}">
            <select required name="cat">
                <option value="" disabled selected hidden>qual o tipo da listagem</option>
                <option value="comida">comida</option>
                <option value="roupa">roupa</option>
                <option value="outro">outro</option>
            </select>
            <input type="submit" value="editar listagem">
        </form>
        </div>
    <br>
    <br>
    EDIT;

}else{
    #imprime as variáveis bonitinhas
    echo <<<ITEM
    <div id="main" class="box">
            <div style="flex-direction: row;">
                <div style="flex-direction:row">
                    <div style="flex-direction: column;">
                        <h1>{$item['titulo']}</h1>
                        <h3>vendido por {$item['uid']}</h3>
                        <p>{$item['descr']}</p>
                    </div>
                    <div style="flex-direction: column; align-items: end;">
                        <h1>R\${$item['preco']}</h1>
                        <h3>{$item['qtd']} disponível(is)</h3>
                        <button onclick="#">comprar</button>
                    </div>
                </div>
            </div>
            
    </div>
    <br>
    <br>
    ITEM;

    # AUTENTICAÇÂO DE USUÀRIO
    # área de gerenciamento do item - WIP
    $auth = true;

    if($auth){
    echo <<<OWNER
    <div id="admin" class="box">
        <button><form action="item.php" method="post">
            <input style="display: none" type="text" name="id" value=$id>
            <input style="display: none" type="text" name="mode" value='edit'>
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
}

    foot();
?>
</body>
</html>