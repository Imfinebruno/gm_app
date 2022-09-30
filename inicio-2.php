<?php

session_start();
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{ 
  header('location:index.php');
  }

$logado = $_SESSION['usuario'];
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
  <link href="css/inicio.css" rel="stylesheet">
  <title>Início</title>
</head>
<body>
  <header id="header">

    <a id="logo"href=""><img src="img/logo-GM.png" alt=""></a>

    <nav id="nav">
      <ul id="menu">
        <li><a href="sitPedidos.php">HISTÓRICO</a></li>
        <li><a href="logout.php">SAIR <-</a></li>
      </ul>
      
      <img id="btn-mobile" src="img/setting1.png" alt="">


    </nav>

  </header>

   <div class="opcoes">

      <h1> <?php echo "Bem vindo $logado" ?> </h1>

     <ul class="lista">
       <a href="sitPedidos.php" id="op1"> <li> VER PEDIDOS </li> </a> 
     </ul>
   </div>

   <script src="script.js"></script>
</body>
</html>