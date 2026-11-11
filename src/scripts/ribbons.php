<?php
@session_start();

function head()
{
if(is_null(@$_SESSION['id'])){
echo <<<HEADER
    <header>
        <a href="search.php">listagens</a>
        <a href="sign.php">login/signup</a>
    </header>
HEADER;
}else{
echo <<<HEADER
    <header>
        <a href="search.php">listagens</a>
        <a href="user.php">usuário</a>
        <a href="msgs.php">mensagems</a>
        <a href="../scripts/exit.php">logout</a>
    </header>
HEADER;
}
}

function foot()
{
    
echo <<<FOOTER
    <footer>
        <p style="max-width: 100%">Gabriel Uczak Dawa 4I — trabalho final de linguagem de programação II - <a href="about.php">sobre o projeto</a></p>
    </footer>
FOOTER;

}
?>