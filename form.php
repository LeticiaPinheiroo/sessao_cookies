<!-- criando_sessao.php -->

<?php
session_start();
/*session is started if you don't write this line can't use $_Session global variable*/

if(isset($_POST["submit"])) {
    $cookie_name = "session_" . time();
    $cookie_value = $_POST["nome"] . "|" . $_POST["email"];
    /* create new cookie with a unique name */
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // cookie expires in 30 days
    header("Location: capturando_sessao.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Criando Sessão</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Criando Sessão</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>