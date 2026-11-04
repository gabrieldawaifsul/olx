<?php
 $sign_form = $_POST["sign"];
@$nome_form = $_POST["nome"];
 $mail_form = $_POST["mail"]; 
 $pass_form = $_POST["pass"];

@session_start();
require 'conn.php';

#login
if($sign_form == 'in'){
    try{
        $qr = mysqli_query($db, "SELECT * FROM users WHERE email = '$mail_form';");
        $qrg = query_result_getter($qr, 'users');
        if($qrg[0]['senha'] == $pass_form){
            # define a sessão
            $user = query_result_getter(mysqli_query($db,"SELECT * FROM users WHERE email = '$mail_form';"), 'users')[0];
            $_SESSION['id'] = $user['id'];  
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['mail'] = $user['email'];
            header("Location: re.php");
        }else{
            echo 'senha errada';
        }
    }catch(mysqli_sql_exception){
        echo 'erro de banco de dados';
    }


#criar conta
}else{
    try{
        $qr = mysqli_query($db, "SELECT * FROM users;");
        $qrg = query_result_getter($qr, 'users');
        
        #bloco de teste pra email existente
        $mail_ja_existe = false;
        foreach($qrg as $row) 
            if($row['email'] == $mail_form)
                $mail_ja_existe = true;
        if($mail_ja_existe == true) 
            throw new Exception();

        #bloco de criar conta nova 
        mysqli_query($db,"INSERT INTO users(email, senha, nome) VALUES('$mail_form','$pass_form','$nome_form');");

    }catch(mysqli_sql_exception){
        echo 'erro de banco de dados';
    }catch(Exception $e){
        echo 'email já cadastrado';
    }

}

?>