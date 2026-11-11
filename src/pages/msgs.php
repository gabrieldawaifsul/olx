<?php
@session_start();
    if(is_null(@$_SESSION['id']))
        header("Location: search.php");

require '../scripts/ribbons.php';
require '../scripts/conn.php';

echo <<<HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../res/styles/msgs.css">
</head>
<body>
HEAD;
head();

@$with = $_GET["user"];
@$search = $_GET["search"];

if(null !== @$_POST["send"]){
    $se = $_SESSION["id"];
    $ge = substr($_SERVER["QUERY_STRING"], 5);
    $te = $_POST["send"];
    $db->execute_query("INSERT INTO mensagens VALUES (?, ?, ?)", [$se, $ge, $te]);
}

# MENSAGEMS
if($with != (0 || null)){
    $un = query_result_getter(
            mysqli_query($db,
                "SELECT * FROM users WHERE id = $with"
            ),'users'
          )[0]["nome"];

    echo <<<MESSAGESA
    <div class="box">
        <div style="display: flex; flex-flow:row; justify-content: space-between;">
            <h2>$un</h2>
            <form id="msgbox" action="msgs.php" method="post">
            <input type="submit" value="<">
            </form>
        </div>
    <hr>
        <div id="msgvw">
    MESSAGESA;

    try{
    $su = $_SESSION["id"];
    $gu = $with;

    $result = query_result_getter(
                mysqli_query($db,
                    "SELECT * FROM mensagens WHERE (sender = $su AND getter = $gu) OR (sender = $gu AND getter = $su);"
                ),'mensagens'
              );

    if($result == null) throw new Exception('404');

    foreach($result as $msg){
        $a = ($msg["sender"] == $_SESSION["id"])? 'msgR': 'msgL';
        $b = $msg["texto"]; 
        
        echo <<<MSG
        <div class="$a">
            $b
        </div>
        MSG;
    }

    }catch(Exception $e){
        echo "<h2>você não tem mensagems esse usuário...</h2>";
    }

    echo <<<MESSAGESB
        </div>
    <hr>
        <form id="msgbox" action="msgs.php?user=$with" method="post">
            <input required type="text" name="send" placeholder="enviar mensagem...">
            <input type="submit" value=">">
        </form>
    </div>
    MESSAGESB;


# BUSCAR
}elseif($search != (0 || null)){
    echo <<<USERSEARCHA
    <div class="box">
        <h2>usuários encontrados:</h2> <hr>
        <div id="carouselbox">
    USERSEARCHA;

    $s = '%'.$_GET["search"].'%';

    try{
        $result = query_result_getter(
                    mysqli_query($db,
                        "SELECT * FROM users WHERE nome LIKE '$s';"
                    ), 'users'
                  );

        if($result == null) throw new Exception('404');

        foreach($result as $row){
            $rid = $row["id"];
            $rnm = $row["nome"];
            echo <<<CARD
            <form class="card" action="msgs.php" method="get">
                <input type="text" name="user" value="$rid" style="display: none;">
                <input type="submit" value="$rnm">
            </form>
            CARD;
        }

    }catch(Exception $e){
        echo '<h3>usuário não encontrado...</h3>';
    }

    echo <<<USERSEARCHB
        </div>
     <hr>
        <form id="searchbox" action="msgs.php" method="get">
            <input required type="search" name="search" placeholder="pesquisar usuários...">
            <input type="submit" value="pesquisar">
        </form>
    </div>
    USERSEARCHB;

# MSGGROUPS
}else{
    echo <<<DEFAULTA
    <div class="box">
        <h2>suas mensagems</h2>
    <hr>
        <div id="carouselbox">
    DEFAULTA;

    # GET grupos de mensagems
    try{
        $sid = $_SESSION["id"];
        $result = query_result_getter(
                mysqli_query($db,
                    "SELECT u.nome AS nm, u.id AS id FROM users AS u WHERE u.id IN (SELECT sender FROM mensagens WHERE getter = $sid GROUP BY sender) OR u.id IN (SELECT getter FROM mensagens WHERE sender = $sid GROUP BY getter) ;"
                ),'msgGrps'
        );
        
        if($result == null) throw new Exception('404');

        foreach($result as $row){
        $rid = $row["id"];
        $rnm = $row["nm"];
            echo <<<CARD
            <form class="card" action="msgs.php" method="get">
                    <input type="text" name="user" value="$rid" style="display: none;">
                    <input type="submit" value="$rnm">
            </form>
            CARD;
        }

    }catch(Exception $e){
        echo "<h2>você não tem mensagems com ninguém...</h2>";
    }

    echo <<<DEFAULTB
        </div>
    <hr>
        <form id="searchbox" action="msgs.php" method="get">
            <input required type="search" name="search" placeholder="pesquisar usuários...">
            <input type="submit" value="pesquisar">
        </form>
    </div>
    DEFAULTB;
}

foot();

echo '</body>';
echo '</html>';
?>    

