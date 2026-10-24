<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link rel="stylesheet" href="../../res/styles/search.css">
</head>
<body>
    <section class="box">
            <form id="searchbox" action="search.php" method="get">
                <input required type="search" name="search" placeholder="pesquisar listagem...">
                <input type="submit" value="pesquisar">
            </form>
        </div>
        <div id="carouselbox">
            <?php
            $allItems = array(
                    '{"tit": "null","cat":"null", "pre": 0.0, "qtd": 0}',
                    '{"tit": "null","cat":"null", "pre": 0.0, "qtd": 0}',
                    '{"tit": "null","cat":"null", "pre": 0.0, "qtd": 0}',
                    '{"tit": "null","cat":"null", "pre": 0.0, "qtd": 0}',
                    '{"tit": "null","cat":"null", "pre": 0.0, "qtd": 0}'
            );
            $tit = null;
            $cat = null;
            $pre = null;
            $qtd = null;

            foreach($allItems as $item){
                
                $json = json_decode($item);

                $tit = $json->{'tit'};
                $cat = $json->{'cat'};
                $pre = $json->{'pre'};
                $qtd = $json->{'qtd'};
                
                echo <<<HEREDOC
                    <div class="card">
                        <div>
                            <h2>$tit</h2>
                            <h3>$cat</h3>
                        </div>
                        <div>
                            <h2>R\$$pre</h2>
                            <h3>restam $qtd</h3>
                        </div>
                    </div>
                HEREDOC;
            }

            ?>

        </div>
    </section>
</body>
</html>