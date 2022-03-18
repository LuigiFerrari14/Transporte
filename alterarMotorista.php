<?php
//chamar a classe 
require_once "usuarios.php";
//criar um objeto do tipo cargo
$motor = new Motorista();
    if(isset($_GET["Id"])){
        $lista = $motor->listarCodigo($_GET['Id']);
    //chamar a funcao inserir verificando se o usuario clicou no botao salvar
    }
    if(isset($_POST["salvar"])){
        $motor->alterar();
    }



?>

<?php
session_start();

if ( !isset($_SESSION['usernameadm'])  ){
    header("Location: ./login.php");
    exit;
}

?>


<?php include('scripts/inicio.php') ?>
    <title>Cadastrar Motorista</title>
  </head>
  <body>
     <div class="container">
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8">
                  <a href="cadastrarMotorista.php" class="btn btn-primary">Voltar</a>
                    <hr class="new1"> 
                </div>
                    
                    <div class="col-md-4">
                         <a href="http://www.novalima.mg.gov.br/" target="_blank" class="thumbnail" >
                <img data-src="holder.js/100%x180" />
   
                <img src="imagens/logo.png" class="img-responsive" alt="PMNL" />
                         </a>
                        
                    </div>
            </div> 
    
    <form action="alterarMotorista.php?Id=<?php echo $lista->id; ?>" method="post" class="padding-center" style="top: 0;">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtNome">Nome:</label>
                <input type="text" value="<?php echo $lista->nome_motorista; ?>" class="form-control" id="txtNome" name="nome_Motorista" pattern="^[-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Separe os nomes com '-'">
            </div>

        <div class="form-row">
            <div class="col">
                <button type="submit" class="btn btn-primary col-md-12" name="salvar">Alterar</button>
            </div>
 
        </div>
    </form>