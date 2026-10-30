<?php
#abre conexão e importa queries
require 'conn.php';

#handler da tipagem do request e incialização das variáveis dependente disto
if($_SERVER['REQUEST_METHOD'] == 'GET'){
                #se não tiver nada especificado, faz o R por padrão
    $CRUD    = @$_GET['CRUD'] == null ? 'R' : $_GET['CRUD']; 
    @$id     = $_GET['id'];
    @$uid    = $_GET['uid'];
    @$preco  = $_GET['preco'];
    @$qtd    = $_GET['qtd'];
    @$titulo = $_GET['titulo'];
    @$descr  = $_GET['descr'];
    @$cat    = $_GET['cat'];
}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
    @$CRUD   = $_POST['CRUD'];
    @$id     = $_POST['id'];
    @$uid    = $_POST['uid'];
    @$preco  = $_POST['preco'];
    @$qtd    = $_POST['qtd'];
    @$titulo = $_POST['titulo'];
    @$descr  = $_POST['descr'];
    @$cat    = $_POST['cat'];
}else{
    echo "Tipo de request incorreto?";
}

$CRUD_Q = array(  
                    'C' => "INSERT INTO items(uid, preco, qtd, titulo, descr, cat) 
                            VALUES('$uid', '$preco', '$qtd', '$titulo', '$descr', '$cat');",

                    'R' => "SELECT * FROM items;",

                    'U' => "UPDATE items SET uid = '$uid', preco = '$preco', qtd = '$qtd', titulo = '$titulo', descr  = '$descr', cat = '$cat' WHERE id = $id;",

                    'D' => "DELETE FROM items WHERE id = $id;"
                );

if($CRUD == 'D')
    mysqli_query($db, "DELETE FROM carrinhos WHERE iid = $id;");

#executa a query e prende o resultado na array $r
$result_temp = mysqli_query($db, $CRUD_Q[$CRUD]);

#loop para transformar cara row em uma array e por todas essas arrays em uma matriz
if($CRUD == 'R')
    $result = query_result_getter($result_temp,'items');

?>