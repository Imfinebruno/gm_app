<?php

include("conexao.php");

session_start();

if (isset($_POST['entrar'])){
    
	$usuario=$_POST['usuario'];
	$senha=$_POST['senha'];

    
    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";
    $query = mysqli_query ($conexao, $sql);
    $row = mysqli_num_rows ($query);
    $nivel = mysqli_fetch_assoc($query);
    

    if($row > 0)
    {   
        //$permissao = $nivel['nivel'];
        $_SESSION['nivel'] = $nivel['nivel'];
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;

        if($_SESSION['nivel'] == 1){
            header('location:inicio.php');
        }
        else if($_SESSION['nivel'] == 2){
            header('location:inicio-2.php');
        }

        die();
    }
    else{
        unset ($_SESSION['usuario']);
        unset ($_SESSION['senha']);
        if(empty($usuario) || empty($senha)) {
            echo "<h2 class='senha-erro'> Você deve digitar seu usuário e senha </h2>";
        }
        else{
            echo "<h2 class='senha-erro'> Usuário ou Senha incorreta </h2>";
        }
    }
    
}

?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;600&family=Montserrat&family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <title>LOGIN GM</title>
</head>
<body class = "container">
    <form action="index.php" method="POST">
    <img class="logo-gm" src="img/logo-GM.png" alt="logo GM">
        <input type="text" id="usuario" class="usuario" name="usuario" placeholder="Digite seu usuário"><br>
        <input type="password" id="password" class="senha" name="senha" placeholder="Senha"><br>
        <input type="submit" class="btn-login" value="Entrar" name="entrar">
    </form>
    
</body>
</html>