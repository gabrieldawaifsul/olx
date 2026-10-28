<?php
#abre conexão
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
    @$CRUD    = $_POST['CRUD'];
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

#array associativa guardando as queries
$queries = array('C' => "INSERT INTO items(uid, preco, qtd, titulo, descr, cat) 
                         VALUES('$uid', '$preco', '$qtd', '$titulo', '$descr', '$cat');",

                 'R' => "SELECT * FROM items;",

                 'U' => "UPDATE items
                         SET uid = '$uid',
                             preco  = '$preco',
                             qtd    = '$qtd',
                             titulo = '$titulo',
                             descr  = '$descr',
                             cat    = '$cat'
                         WHERE id = $id;",

                 'D' => "DELETE FROM items WHERE id = $id;"
                );

#executa a query e prende o resultado na array $r
$query_result_temp = mysqli_query($db, $queries[$CRUD]);

#processa a query -> array
function user_fetch_assoc_to_array($fa){
    return array(
        'id'     => $fa["id"],
        'uid'    => $fa["uid"],
        'preco'  => $fa["preco"],
        'qtd'    => $fa["qtd"],
        'titulo' => $fa["titulo"],
        'descr'  => $fa["descr"],
        'cat'    => $fa["cat"]
    ); 
}

#loop para chamar a função acima repetidamente
if($CRUD == 'R')
    while($row = mysqli_fetch_assoc($query_result_temp))
        $result[] = user_fetch_assoc_to_array($row);

#fecha a conexão
mysqli_close($db);

require 'redirect.html';

?>