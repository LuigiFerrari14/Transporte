<?php
//chamar a classe 
require_once "usuarios.php";
//criar um objeto do tipo cargo
$motor = new Motorista();
$lista = $motor->listarTodos();
//chamar a funcao inserir verificando se o usuario clicou no botao salvar
if(isset($_GET["salvar"])){
    $motor->inserir();
}

    if(isset($_GET["id"])){
        $motor->excluir($_GET["id"]);
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
                  <a href="indexADMIN.php" class="btn btn-primary">Voltar</a>
                    <hr class="new1"> 
                </div>
                    
                    <div class="col-md-4">
                         <a href="http://www.novalima.mg.gov.br/" target="_blank" class="thumbnail" >
                <img data-src="holder.js/100%x180" />
   
                <img src="imagens/logo.png" class="img-responsive" alt="PMNL" />
                         </a>
                        
                    </div>
            </div> 
    
    <form action="cadastrarmotorista.php" method="get" class="padding-center" style="top: 0;">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtNome">Nome(s):</label>
                <input type="text" class="form-control" id="txtNome" name="nome_Motorista" pattern="^[-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Separe os nomes com '-'" required>
            </div>

        <div class="form-row">
            <div class="col">
                <button type="submit" class="btn btn-primary col-md-12" name="salvar">Cadastrar</button>
            </div>
 
        </div>
    </form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->




    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Motoristas</h3>
                    </div>
<div class="panel-body">
<div style="overflow: auto; width: auto; height: 400px; ">
            <table class="table table-striped table table-bordered table-hover table-responsive">
                    <tr>

                <thead> 
                        <th>Nome</th>
                        <th>Excluir/Alterar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if($lista) : ?>
                    <?php foreach ($lista as $motor) :?>

                    <tr> 
                        <td><?php echo $motor->nome_motorista; ?></td>
                        <td><a href="cadastrarmotorista.php?id=<?php echo $motor->id; ?>" class="btn btn-sm btn-danger" >Excluir</a> <a href="alterarMotorista.php?Id=<?php echo $motor->id; ?>" class="btn btn-sm btn-primary" name="alterar">Alterar</a>
 
                       
                    </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="7">Nenhum registro encontrado</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
  </body>
</html>
