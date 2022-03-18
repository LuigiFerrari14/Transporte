<?php 
include_once("conexoes/conexao.php");
?>

<?php
//chamar a classe 
require_once "usuarios.php";
//criar um objeto do tipo cargo
$usuario = new Usuarios();
//chamar a funcao inserir verificando se o usuario clicou no botao salvar
if(isset($_GET["salvar"])){
    $usuario->inseriradm();
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
    <title>Agendar Adm</title>
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
    
    <form action="cadastrar.php" method="get" class="padding-center" style="top: 0;">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtNome">Nome(s):</label>
                <input type="text" class="form-control" id="txtNome" name="pessoas_carro" pattern="^[-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Separe os nomes com '-'" required>
            </div>



  <div class="form-group col-md-6">
                <label for="txtNome">Data:</label>
                <input type="date" class="form-control" id="txtHorario_saida" name="Start" required>
            </div>


                        <div class="form-group col-md-6">
            <label for="txtQtdpessoa">Quantidade de pessoas que irão no Veiculo:</label>
            <input name="qtdpessoa" class="form-control" pattern="[0-9]+" title="Somente Números" required>
   
        </div>


                    <div class="form-group col-md-3">                
                <label for="txtModelo1">Motorista:</label>
                <select class="form-control" name="motorista">
                    <option value="A_definir">--- Escolha um Motorista ---</option>
                    <?php
                    $result_cat_post = "SELECT * FROM motorista";
                    $resultado_cat_post = mysqli_query($conn, $result_cat_post);
                    while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ){ ?>
                    <option value="<?php echo $row_cat_post['nome_motorista']; ?>"><?php echo $row_cat_post['nome_motorista'];?>
                    </option><?php
                    }
                    ?>
                </select>
            </div>

                                <div class="form-group col-md-3">                
                <label for="txtModelo1">Motorista2:</label>
                <select class="form-control" name="motorista2">
                    <option value="A_definir">--- Caso Exista ---</option>
                    <?php
                    $result_cat_post = "SELECT * FROM motorista";
                    $resultado_cat_post = mysqli_query($conn, $result_cat_post);
                    while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ){ ?>
                    <option value="<?php echo $row_cat_post['nome_motorista']; ?>"><?php echo $row_cat_post['nome_motorista'];?>
                    </option><?php
                    }
                    ?>
                </select>
            </div>


              <div class="form-group col-md-6">
                <label for="txtNome">Horario de Saida:</label>
                <input type="time" class="form-control" id="txtHorario_saida" placeholder="--:--" name="horario_saida" required>
            </div>
                          <div class="form-group col-md-6">
                <label for="txtNome">Horario de Chegada:</label>
                <input type="time" class="form-control" id="txtHorario_retorno" placeholder="--:--" name="horario_retorno" required>
            </div>
            
<div class="form-group col-md-6">
                <label for="txtNome">Local de Saida:</label>
                <input value="Semed" type="text" class="form-control" id="txt4" name="local_saida" pattern="^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Proibida a utilização de Caracteres Especiais" required="required"><span class="required"></span>
            </div>


          <div class="form-group col-md-6">
                <label for="txtNome">Local de Destino:</label>
                <input type="text" class="form-control" id="txtLocal" name="Title" pattern="^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Proibida a utilização de Caracteres Especiais" required>
            </div>

            <div class="form-group col-md-12">
                <label for="txtNome">Total de pessoas que podem entrar no veiculo:</label>
                <input type="text" class="form-control" id="txtTotal_lugares" name="total_lugares" pattern="[0-9]+" title="Somente Números" required>
            </div>

             <div class="form-group col-md-12">
                <label for="txtNome">Obsevação:</label>
             
                <textarea rows="5"  class="form-control"  name="observacao"></textarea>
                
              </div>

          
<input type="hidden" class="form-control" id="txtNome" name="nome" value="Admin">

<input type="hidden" class="form-control" id="txtstatus" name="status" value="Em_analise" >


        <div class="form-row">
            <div class="col">
                <button type="submit" class="btn btn-primary col-md-12" name="salvar">Cadastrar</button>
            </div>
 
        </div>
    </form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
