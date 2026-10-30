<?php
#abre conexão
require 'conn.php';

#handler da tipagem do request e incialização das variáveis dependente disto
if($_SERVER['REQUEST_METHOD'] == 'GET'){
                #se não tiver nada especificado, faz o R por padrão
    $CRUD    = @$_GET['CRUD'] == null ? 'R' : $_GET['CRUD']; 
    @$id   = $_GET['id'];
    @$mail = $_GET['mail'];
    @$pass = $_GET['pass'];
    @$nome = $_GET['nome'];
}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
    $CRUD  = $_POST['CRUD'];
    @$id   = $_POST['id'];
    @$mail = $_POST['mail'];
    @$pass = $_POST['pass'];
    @$nome = $_POST['nome'];
}else{
    echo "Tipo de request incorreto?";
}

#array associativa guardando as queries
$CRUD_Q = array(
                    'C' => "INSERT INTO users(email, senha, nome) 
                            VALUES('$mail','$pass','$nome');",  

                    'R' => "SELECT * FROM users;",  

                    'U' => "UPDATE users
                            SET email = '$mail', 
                                senha = '$pass', 
                                nome = '$nome' 
                            WHERE id = $id;",   

                    'D' => "DELETE FROM users 
                            WHERE id = $id;"
                );

if($CRUD == 'D'){
    mysqli_query($db, "DELETE FROM carrinhos WHERE uid = $id;");
    mysqli_query($db, "DELETE FROM mensagems WHERE sender = $id;");
    mysqli_query($db, "DELETE FROM mensagems WHERE getter = $id;");
}

#executa a query e prende o resultado na array $r
$result_temp = mysqli_query($db, $CRUD_Q[$CRUD]);

#chama a função acima para Read por ID 
if($CRUD == 'R')
    $result = query_result_getter($result_temp,'users');

?>