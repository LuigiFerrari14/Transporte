<?php
    //Conectando ao banco de dados
    include "usuarios.php";
    

    $consulta = $smtp = $pdo->prepare("select * from usuario");

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        //echo "Nome: {$linha['nome']} - E-mail: {$linha['email']}<br />";
        $vetor[] = $linha;
     }

    //Passando vetor em forma de json
    echo json_encode($vetor);
    
?>
