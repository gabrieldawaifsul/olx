<?php
#abre conexão e importa queries
require 'conn.php';
@session_start();

#handler da tipagem do request e incialização das variáveis dependente disto
if($_SERVER['REQUEST_METHOD'] == 'GET'){
                #se não tiver nada especificado, faz o R por padrão
    $CRUD    = @$_GET['CRUD'] == null ? 'R' : $_GET['CRUD']; 
    @$iid    = $_GET['iid'];
    @$uid    = $_GET['uid'];
}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
    @$CRUD   = $_POST['CRUD'];
    @$iid     = $_POST['iid'];
    @$uid     = $_POST['uid'];
}else{
    echo "Tipo de request incorreto?";
}

if($_SERVER["QUERY_STRING"] != null){
    try{
        $uid = $_SESSION['id'];
        $iid = $_SERVER["QUERY_STRING"];

        mysqli_query($db, "DELETE FROM carrinhos WHERE iid = $iid AND uid = $uid;");

    @header("Location: re.php");
    }catch(Exception $e){
        echo 'erro de query';
    }

}

$CRUD_Q = array(  
                    'C' => "INSERT INTO carrinhos VALUES('$uid', '$iid');",

                    'R' => "SELECT * FROM carrinhos;"
                );
                
#executa a query e prende o resultado na array $r
$result_temp = mysqli_query($db, $CRUD_Q[$CRUD]);

#loop para transformar cara row em uma array e por todas essas arrays em uma matriz
if($CRUD == 'R')
    $result = query_result_getter($result_temp,'carrinhos');

@header("Location: re.php");
?>