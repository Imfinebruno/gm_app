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
    <link href="css/pedido.css" rel="stylesheet">
    <title>EPI's</title>
</head>
<body>

    <header id="header">

        <a id="logo"href="inicio.php"><img src="img/logo-GM.png" alt=""></a>

        <nav id="nav">
            <ul id="menu">
                <li><a href="historico.php">HISTÓRICO</a></li>
                <li><a href="logout.php">SAIR <-</a></li>
            </ul>
        
        <img id="btn-mobile" src="img/setting1.png" alt="">
        </nav>

    </header>

    <div class="pedido">
            <h1> RESUMO DO PEDIDO </h1>
            <div class="resumo">
                <div class="tabela">
                    <h2>ITEM</h2>
                    <h2>QTD</h2>
                </div>
                <hr class="linha1">
                <div class="linha2"></div>

                <?php

                    $qtd = null;
                    $itens = null;

                    $_SESSION['dados'] = array();

                    //QUANTIDADE
                    if(isset($_POST['qtd'])){
                        $qtd = $_POST['qtd'];
                    }
                    
                    $qtdLimpa= array_filter($qtd);
                    $qtdLimpa= array_values($qtdLimpa);


                    //PRODUTO
                    if(isset($_POST['produto'])){
                        $itens = $_POST['produto'];                    
                    }

                    if($itens != null){
                        for($i = 0; $i < count($itens); $i++){
                            echo "<div class='itens'>
                                        <p>$itens[$i]</p>
                                        <p>$qtdLimpa[$i]</p>                                                                              
                                </div>
                            <hr>";

                            //BOTANDO NUMA ARRAY
                            array_push(
                                $_SESSION['dados'],
                                array(
                                    'produto' => $itens[$i],
                                    'quantidade' => $qtdLimpa[$i]
                                )
                            );

                        }
                    }else{
                        echo "NENHUM ITEM SELECIONADO";
                    }
                    
                    // dd($itens);
                    // dd($qtdLimpa);
                    // function dd ($param){
                    //     echo "<pre>";
                    //         print_r($param);
                    //     echo "</pre>";
                    // }
                ?>
            </div>
                <footer>                       
                        <div class="footer-1">
                            <a class="voltar-btn" href="javascript:history.back()">EDITAR</a>

                            <a href="finalizar.php" id="confirmar"> Confirmar </a>
                        </div>
                        <div class="footer-2">
                            <a class="cancelar-btn" href="inicio.php">CANCELAR</a>
                        </div>
                </footer>
                
</div>
   

    <script src="script.js"></script>
</body>
</html>