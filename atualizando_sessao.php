<!-- atualizando_sessao.php -->

<?php
session_start();
/*session is started if you don't write this line can't use $_Session global variable*/

$cookie_data = array();

foreach ($_COOKIE as $key => $value) {
    if (strpos($key, 'session_') === 0) {
        $cookie_data[$key] = $value;
    }
}

if(isset($_POST["submit"])) {
    $selected_cookie = $_POST["selected_cookie"];
    $updated_nome = $_POST["updated_nome"];
    $updated_email = $_POST["updated_email"];
    /* update the value of the selected cookie */
    $updated_value = $updated_nome . "|" . $updated_email;
    setcookie($selected_cookie, $updated_value, time() + (86400 * 30), "/"); // cookie expires in 30 days
    header("Location: capturando_sessao.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizando Sessão</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Atualizando Sessão</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="selected_cookie">Selecione o Cookie:</label>
                <select name="selected_cookie" class="form-control" required>
                    <?php foreach ($cookie_data as $key => $value) {
                        $data = explode("|", $value);
                        echo '<option value="' . $key . '">' . $data[0] . ' - ' . $data[1] . '</option>';
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="updated_nome">Novo Nome:</label>
                <input type="text" name="updated_nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="updated_email">Novo Email:</label>
                <input type="email" name="updated_email" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>
</html>