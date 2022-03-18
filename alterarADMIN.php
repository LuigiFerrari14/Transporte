<?php 
include_once("conexoes/conexao.php");
?>
<?php
    //chamar a classe 
    require_once "usuarios.php";
    //criar um objeto do tipo cargo
    $usuario = new Usuarios();
    //passsando como parm o codigo escolhido pelo user no index
    if(isset($_GET["Id"])){
        $lista = $usuario->listarCodigo($_GET['Id']);
    //chamar a funcao inserir verificando se o usuario clicou no botao salvar
    }
    if(isset($_POST["salvar"])){
        $usuario->alterar();
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
    <title>Alterar Adm</title>
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

    <form action="alterarADMIN.php?Id=<?php echo $lista->id; ?>" method="post" class="padding-center" style="top: 0;">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtNome">Nome:</label>
                <input type="text" value="<?php echo $lista->Pessoas_carro; ?>" class="form-control" id="txtNome" name="pessoas_carro" pattern="^[-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Separe os nomes com '-'">
            </div>
            <div class="form-group col-md-6">
                <label for="txtNome">Data:</label>
                <input type="date" value="<?php echo $lista->start; ?>" class="form-control" id="txtNome" name="Start">
            </div>
                  <div class="form-group col-md-6">
                <label for="txtQtdpessoa">Quantidade de pessoas que vão no Carro:</label><input type="text" value="<?php echo $lista->Qtdpessoa; ?>" class="form-control" id="txtLocal" name="qtdpessoa" pattern="[0-9]+" title="Somente Números">
                
            </div>
                 

  <div class="form-group col-md-3">
                <label for="txtNome">Motorista:</label>
               
                
                <select class="form-control" name="motorista">
                    <option value="<?php echo $lista->Motorista; ?>"><?php echo $lista->Motorista; ?></option>
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
                <label for="txtNome2">Motorista2:</label>
               
                
                <select class="form-control" name="motorista2">
                    <option value="<?php echo $lista->Motorista2; ?>"><?php echo $lista->Motorista2; ?></option>
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
                <label for="txtHorario">Horario de Saida:</label>
                <input type="time" value="<?php echo $lista->Horario_saida; ?>" class="form-control" id="txtHorario_saida" name="horario_saida">
            </div>

                    <div class="form-group col-md-6">
                <label for="txtHorario">Horario de Retorno:</label>
                <input type="time" value="<?php echo $lista->Horario_retorno; ?>" class="form-control" id="txtHorario_retorno" name="horario_retorno">
            </div>

                                            <div class="form-group col-md-6">
                <label for="txtLocal">Local de Origem:</label>
                <input type="text" value="<?php echo $lista->Local_saida; ?>" class="form-control" id="txtLocal" name="local_saida" pattern="^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Proibida a utilização de Caracteres Especiais">
              
            </div>
            
   <div class="form-group col-md-6">
                <label for="txtLocal">Local de Destino:</label>
                <input type="text" value="<?php echo $lista->title; ?>" class="form-control" id="txtLocal" name="Title" pattern="^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Proibida a utilização de Caracteres Especiais">
            </div>

            <div class="form-group col-md-6">
                <label for="txtTotal_lugares">Total de pessoas que podem entrar no carro:</label>
                <input type="text" value="<?php echo $lista->Total_lugares; ?>" class="form-control" id="txtTotal_lugares" name="total_lugares" pattern="[0-9]+" title="Somente Números">
            </div>

             <div class="form-group col-md-6">
                <label for="txtStatus">Status:</label>
                <select type="text"  class="form-control" id="txtStatus" name="status">
                    <option value="<?php echo $lista->Status; ?>"><?php echo $lista->Status; ?></option>
                    <option value="Aprovado">Aprovado</option>
					<option value="Em_Analise">Em Analise</option>
					<option value="Cancelado">Cancelado</option>

 </select>


            </div>

            <div class="form-group col-md-12">
                <label for="txtNome">Obsevação:</label>
             
                <input type="text" value="<?php echo $lista->Observacao; ?>" class="form-control"  name="observacao"  title="Proibida a utilização de Caracteres Especiais">
                
              </div>

        
        </div>
        <div class="form-row">
            <div class="col">
                <button type="submit" class="btn btn-primary col-md-12" 
                name="salvar" >Alterar</button>
                            </div>
   
        </div>
    </form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>