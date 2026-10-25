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

$item = json_decode('{
            "id": 0,
            "uname": "aluno",
            "titulo": "listagem",
            "descr": "lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum", 
            "preco": 100, 
            "qtd": 0
          }');

$titulo = $item->{'titulo'};
$uname = $item->{'uname'};
$descr = $item->{'descr'};
$preco = $item->{'preco'};
$qtd = $item->{'qtd'};

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
ITEM;

foot();
?>

</body>
</html>