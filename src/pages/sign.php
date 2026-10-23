<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>criar ou entrar em uma conta</title>
    <link rel="stylesheet" href="../../res/styles/split.css">
</head>
<body>
    <section id="left">
        <h1 id="pickerTitle">entrar na sua conta ou criar uma nova conta</h1>
    </section>
    <section id="right">
        <section id="pickerSect">
            <button id="loginPickerButton" onclick="pickLogin()">entrar na conta</button>
            <button id="signupPickerButton" onclick="pickSignup()">criar uma conta</button>
        </section>
        <section id="loginSect">
            <form action="../scripts/auth.php" method="post">
                <input type="text" name="loginMail" id="loginMail" placeholder="insira seu email" required>
                <input type="password" name="loginPass" id="loginPass" placeholder="insira sua senha" required>
                <input type="submit" value="login">
            </form>
            <button onclick="pickSignup()" class="xtoy">> não tem uma conta?</button>
        </section>
        <section id="signupSect">
            <form action="../scripts/auth.php" method="post">
                <input type="text" name="signupName" id="signupName" placeholder="insira um nome" required>
                <input type="text" name="signupMail" id="signupMail" placeholder="insira um email" required>
                <input type="password" name="signupPass" id="signupPass" placeholder="insira uma senha" required>
                <input type="submit" value="login">
            </form>
            <button onclick="pickLogin()" class="xtoy">> já tem uma conta?</button>
        </section>
    </section>

    <script src="../scripts/sign.js" async></script>
</body>
</html>