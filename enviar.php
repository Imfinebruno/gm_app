<?php
include("conexao.php");

$alterar = null;
$passedId = null;

if(isset($_POST['enviado'])){
    $alterar = $_POST['enviado'];
    $passedId= $_POST['id'];
}
else if (isset($_POST['concluído'])){
    $alterar = $_POST['concluído'];
    $passedId= $_POST['id'];
}
else if (isset($_POST['cancelado'])){
    $alterar = $_POST['cancelado'];
    $passedId= $_POST['id'];
}

$alterar = "UPDATE pedido SET status = '{$alterar}' WHERE id = '{$passedId}'";
mysqli_query($conexao, $alterar);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;600&family=Montserrat&family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    <link href="css/sitPedidos.css" rel="stylesheet">
    <title>STATUS ALTERADO</title>
</head>
<body>
    <div class="status-alert">
        <h1>Alterado com sucesso!</h1>
        <a href="sitPedidos.php">Voltar</a>
    </div>    
    <script src="script.js"></script>
</body>
</html>
    
