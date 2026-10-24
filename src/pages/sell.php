<?php require '../scripts/ribbons.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sell</title>
    <link rel="stylesheet" href="../../res/styles/style.css">
</head>
<body>
<?php head();?>
    <div class="box">
        <h1>criar uma <br> nova listagem</h1>
    <form action="sellScript.php" method="post">
        <input required type="text" name="nome" placeholder="nome da listagem">
        <input required type="number" name="price" placeholder="preco do item">
        <input required type="number" name="qtd" placeholder="quantos disponível">
        <input required type="text" name="desc" placeholder="descreva a listagem">
        <select required name="cat">
            <option value="" disabled selected hidden>qual o tipo da listagem</option>
            <option value="comida">comida</option>
            <option value="roupa">roupa</option>
            <option value="outro">outro</option>
        </select>
        <input type="submit">
    </form>
    </div>
<?php foot();?>
</body>
</html>