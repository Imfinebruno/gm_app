<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/estilo.css">
    <title>VETORES</title>
</head>
<body>
    <div>
        <pre>
            <?php  
                $n = array(3,5,8,2);
                print_r($n);

                $c = range(5,20,2); //primeira posicao 5, ultima 20, contando de 2 em 2 os numeros
                print_r($c);
                foreach($c as $v){ //mostra cada item da array na tela
                    echo "$v ";
                };

                $a = array(1 => "A", 3 => "B", 6 => "C"); //cria posições personalizadas

                unset($a[6]); //tira a posição
                print_r($a);

                $cad = array ("nome"=> "Bruno","idade"=> 21, "peso"=> "63.8kg"); //declarando posições com string
                $cad["fuma"] = true;
                
                foreach($cad as $key => $info){ //associar informações as variaveis
                    echo "O conteúdo $key possui $info <br>";
                };
               
            ?>
        </pre>
    </div>
</body>
</html>