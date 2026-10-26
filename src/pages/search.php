<?php require '../scripts/ribbons.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link rel="stylesheet" href="../../res/styles/search.css">
</head>
<body>
<?php head();

# cria array
$allItems = [];

include("../scripts/conn.php");

# faz a query e guarda em default result
$defaultQuery = "SELECT * FROM items;";
$defaultResult = mysqli_query($db, $defaultQuery);

# salva o resultado da query em um json literal chamado $allItems
if(mysqli_num_rows($defaultResult) > 0){
    while($card = mysqli_fetch_assoc($defaultResult)){
        $allItems[] = '{"tit": "' . $card["titulo"] . '","cat":"' . $card["cat"] . '", "pre": ' . $card["preco"] . ', "qtd": ' . $card["qtd"] . ', "href": "' . $card["id"] . '"}';
    };

}

mysqli_close($db);
?>

    <section class="box">

            <form id="searchbox" action="search.php" method="get">
                <input required type="search" name="search" placeholder="pesquisar listagem...">
                <input type="submit" value="pesquisar">
            </form>

<!-- div onde o foreach vai iterar-->
        <div id="carouselbox">
            <?php
            
            $tit = null;
            $cat = null;
            $pre = null;
            $qtd = null;

            # lê a array $allItems
            foreach($allItems as $item){
                
                $json = json_decode($item);
                # extrai os valores em variáveis 
                $tit = $json->{'tit'};
                $cat = $json->{'cat'};
                $pre = $json->{'pre'};
                $qtd = $json->{'qtd'};
                $href = $json->{'href'};
                
                # cria um div card com os valores dentro
                echo <<<CARD
                    <div class="card">
                        <div>
                        <a href="item.php?$href">
                            <h2>$tit</h2>
                        </a>
                            <h3>$cat</h3>
                        </div>
                        <div>
                            <h2>R\$$pre</h2>
                            <h3>restam $qtd</h3>
                        </div>
                    </div>
                CARD;
            }
            ?>
        </div>
        <br>
    <a href="sell.php">deseja criar uma nova listagem?</a>
    </section>


<?php foot();?>
</body>
</html>