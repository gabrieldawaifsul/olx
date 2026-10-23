<?php
function head()
{

/*conditional. if not logged in show 
<header>
        <a href="../../index.php">de volta ao início</a>
    </header>
*/

echo <<<HEADER
    <header>
        <a href="search.php">listagems</a>
        <a href="user.php">usuário</a>
        <a href="msgs.php">mensagems</a>
    </header>
HEADER;
}

function foot()
{
    
echo <<<FOOTER
    <footer>
        <p>Gabriel Uczak Dawa 4I — trabalho final de linguagem de programação II - <a href="about.php">sobre o projeto</a></p>
    </footer>
FOOTER;

}
?>