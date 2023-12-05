<!-- capturando_sessao.php -->

<?php
session_start();
/*session is started if you don't write this line can't use $_Session global variable*/

$cookie_data = array();

foreach ($_COOKIE as $key => $value) {
    if (strpos($key, 'session_') === 0) {
        $cookie_data[$key] = $value;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Capturando Sessão</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Capturando Sessão</h1>
        <?php foreach ($cookie_data as $key => $value) {
            $data = explode("|", $value);
        ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Dados Capturados</h5>
                    <p class="card-text">Nome: <?php echo $data[0]; ?></p>
                    <p class="card-text">Email: <?php echo $data[1]; ?></p>
                </div>
            </div>
        <?php } ?>

        <div class="container">
        <p>Selecione uma ação:</p>
        <a href="atualizando_sessao.php" class="btn btn-primary">Atualizar Sessão</a>
        <a href="excluindo_sessao.php" class="btn btn-danger">Excluir Sessão</a>
        <a href="form.php" class="btn btn-secondary">Voltar ao Formulário</a>
    </div>

    </div>

    
</body>
</html>