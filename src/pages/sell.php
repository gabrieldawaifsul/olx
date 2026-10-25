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
    <form action="../scripts/sellScript.php" method="post">
        <input required maxlength=64 type="text" name="tit" placeholder="nome da listagem">
        <input required min=0 type="number" name="prc" placeholder="preco do item">
        <input required min=1 type="number" name="qtd" placeholder="quantos disponível">
        <input required maxlength=1024 type="text" name="dsc" placeholder="descreva a listagem">
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