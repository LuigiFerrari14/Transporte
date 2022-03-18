<?php
    //chamar o arquivo cargos.php
    require_once "usuarios.php";
    //criar um objeto do tipo cargo
    $usuario = new Usuarios();
    //chamar a funcao listarTodos()
    $lista = $usuario->listarTodos();

    //chamar a fucao excluir passando o codigo escolhido pelo usuario
    if(isset($_GET["codigo"])){
        $usuario->excluir($_GET["codigo"]);
    }
?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Você deve logar primeiro!";
    header('location: login.php');
  }
  if (isset($_GET['Sair'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<?php include('scripts/inicio.php') ?>
        <title>Chat</title>
</head>
<body>
<div class="container">
     <div class="row">
                
                <div class="col-md-8 col-lg-8">
            <a href="indexL.php" class="btn btn-primary">Voltar</a>
            
            <hr class="new1">      
                </div>
                    <div class="row">
                    <div class="col-md-4">
                         <a href="http://www.novalima.mg.gov.br/" target="_blank" class="thumbnail" >
                <img data-src="holder.js/100%x180" />
   
                <img src="imagens/logo.png" class="img-responsive" alt="PMNL" />
                         </a>
                        
                    </div>
            </div> 





<?php
$con = new pdo("mysql:host=localhost; dbname=transporte", "root", "thiago");
if ( !empty($_POST)){
    $sql = $con->prepare("insert into post (data, nome, mensagem) VALUES (now(), ?, ?)");
    $sql->execute(array($_POST ['nome'], $_POST['mensagem']));
}


$sql = $con->prepare("SELECT * FROM post");

$sql->execute();


$rows = $sql->fetchAll(PDO::FETCH_CLASS);

echo "<table class='table table-striped'  border='1'>";

foreach ($rows as $row){

    $dt = date ("d/m h:i", strtotime($row->data));

echo "<tr><td>$dt</td> <td> $row->nome</td> <td> $row->mensagem</td></tr>";
//<tr> LINHA
//<td> COLUNA

}

//fechAll  - fubção para selecionar todos os registros
//PDO::FETCH_CLASS -


?>


    <div class="form-group">
        <form action="" method="post">
        <label>Nome</label>
        <input class="form-control" value="<?php if($_SESSION['username'] == null){echo 'Agendar';}else{echo $_SESSION['username'];} ?>" name="nome" id="nome2" disabled>
                <input type="hidden" name="nome" value="<?php if($_SESSION['username'] == null){echo 'Agendar';}else{echo $_SESSION['username'];} ?>">

<BR>
        <label>Mensagem</label>
        <textarea rows="5" cols="50" input type="text" name="mensagem" class="form-control""></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block" name="enviar" >Enviar</button>
</div>


<br><br>




</div>
</body>
</html>