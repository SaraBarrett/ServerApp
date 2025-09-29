<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Superglobais</title>
</head>
<body>
    <h4>Formulário de SuperGlobais</h4>

      <!-- Exemplo de SuperGlobais -->
    <h3>O que vem no $_REQUEST:</h3>
    <?= print_r($_REQUEST);?>
    <br>
    <h3>O que vem no $_GET:</h3>
    <?= print_r($_GET);?>
    <br>

    <h3>O que vem no $_POST:</h3>
    <?php print_r($_POST);?>

    <h3>Formulário de teste</h3>
    <form method="get">
        GET Form: <input type="text" name="get_name">
        <input type="submit" value="Submit GET">
    </form>
    <form method="post">
        POST Form: <input type="text" name="post_name">
        <input name="password" type="password">
        
        <input type="submit" value="Submit POST">
    </form>
    <a href="superglobais_form.php">Reset</a>
    
</body>
</html>