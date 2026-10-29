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

include("../scripts/itemCRUD.php");

if(isset($_GET["search"])){
    $result = query_result_getter(
        mysqli_query($db,
            "SELECT * FROM items WHERE MATCH(titulo, descr, cat) AGAINST ('*{$_GET["search"]}*' IN BOOLEAN MODE);"
        ),'items'
    ); 
}


?>
    <section class="box">
            <form id="searchbox" action="search.php" method="get">
                <input required type="search" name="search" placeholder="pesquisar listagem...">
                <input type="submit" value="pesquisar">
            </form>

<!-- div onde o foreach vai iterar-->
        <div id="carouselbox">
            <?php
            
            # lê a array $allItems
            foreach($result as $item){   
                # cria um div card com os valores dentro
                echo <<<CARD
                    <div class="card">
                        <div>
                        <a href="item.php?{$item['id']}">
                            <h2>{$item['titulo']}</h2>
                        </a>
                            <h3>{$item['cat']}</h3>
                        </div>
                        <div>
                            <h2>R\${$item['preco']}</h2>
                            <h3>restam {$item['qtd']}</h3>
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