<!-- excluindo_sessao.php -->

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
    /* delete the selected cookie */
    setcookie($selected_cookie, "", time() - 3600, "/"); // set cookie expiration in the past to delete it
    header("Location: capturando_sessao.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluindo Sessão</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Excluindo Sessão</h1>
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
            <button type="submit" name="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cookie?')">Excluir</button>
        </form>
    </div>
</body>
</html>