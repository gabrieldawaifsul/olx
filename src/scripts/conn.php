<?php

$db = mysqli_connect('mysql', 'root', 'yes', 'olx-db');

#fata = fetch_assoc_to_array
#$fetch_assoc, $table
function fata($fa, $t){
    switch($t){
        case 'items':
            return array(
                        'id'     => $fa["id"],
                        'uid'    => $fa["uid"],
                        'preco'  => $fa["preco"],
                        'qtd'    => $fa["qtd"],
                        'titulo' => $fa["titulo"],
                        'descr'  => $fa["descr"],
                        'cat'    => $fa["cat"]
                        ); 
            break;
        case 'users':
            return array(
                        'id'    => $fa["id"],
                        'email' => $fa["email"],
                        'senha' => $fa["senha"],
                        'nome'  => $fa["nome"]
                        );
            break;
        case 'mensagens':
            return array(
                        'sender' => $fa["sender"],
                        'getter' => $fa["getter"],
                        'texto'  => $fa["texto"]
                        );
            break;
        case 'carrinhos':
            return array(
                        'uid' => $fa["uid"],
                        'iid' => $fa["iid"]
                        );
            break;
        default:
            echo 'FATA ERROR: essa tabela não existe';
            break;
    }
}

#resultado de query -> matriz
function query_result_getter($rq){
    $result = null;
    while($row = mysqli_fetch_assoc($rq))
        $result[] = fata($row);
    return $result;
}

?>