<?php
#abre conexão
require 'conn.php';

#handler da tipagem do request e incialização das variáveis dependente disto
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $CRUD  = $_GET['CRUD'];
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
$queries = array('C' => "INSERT INTO users(email, senha, nome) 
                         VALUES('$mail','$pass','$nome');",

                 'R' => "SELECT * FROM users WHERE id = '$id';",
                 'Ra'=> "SELECT * FROM users;",

                 'U' => "UPDATE users
                         SET email = '$mail', 
                             senha = '$pass', 
                             nome = '$nome' 
                         WHERE id = $id;",

                 'D' => "DELETE FROM users 
                         WHERE id = $id;"
                );

#executa a query e prende o resultado na array $r
$query_result_temp = mysqli_query($db, $queries[$CRUD]);

#processa a query -> array
function user_fetch_assoc_to_array($fa){
    return array(
        'id'    => $fa["id"],
        'email' => $fa["email"],
        'senha' => $fa["senha"],
        'nome'  => $fa["nome"]
    ); 
}

#chama a função acima para Read por ID 
if($CRUD == 'R')
    $result = user_fetch_assoc_to_array(mysqli_fetch_assoc($query_result_temp));

#loop para chamar a função acima repetidamente
if($CRUD == 'Ra')
    while($row = mysqli_fetch_assoc($query_result_temp))
        $result[] = user_fetch_assoc_to_array($row);

#fecha a conexão
mysqli_close($db);

?>