<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;600&family=Montserrat&family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    <link href="css/popup.css" rel="stylesheet">
    <?php echo '<title>PEDIDO</title>' ?>
</head>
<body>

    <header id="header">

    </header>

    <div class="pedido">
        <h1> PEDIDO </h1>
        <div class="resumo">
            <div class="tabela">
                <h2>ITEM</h2>
                <h2>QUANTIDADE</h2>
            </div>
            <hr class="linha1">
        <div class="linha2"></div>

        <?php
            include("conexao.php");

            $_SESSION['pedido'] = array();
            
            $sql = "SELECT PP.quantidade, PR.nome FROM pedido_produto PP
            JOIN pedido P ON P.id = PP.pedido_id
            JOIN produto PR ON PR.id = PP.produto_id
            GROUP BY PR.id ORDER BY P.id DESC";

            $qr = mysqli_query($conexao, $sql);

            // $ln = mysqli_fetch_array($qr, MYSQLI_ASSOC);

            
            while ($ln = mysqli_fetch_assoc ($qr) ){
                echo'<li class="lista">
                            <p>'.$ln['nome'].'</p>
                            <p>'.$ln['quantidade'].'</p>
                        </li>
                        <hr>';
            }  


            dd($ln);
            function dd ($param){
                echo "<pre>";
                    print_r($param);
                echo "</pre>";
            }  
        ?>
        
    </div>
    
    <script src="script.js"></script>
</body>
</html>