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
        $usuario->entrar();
    }
?>
<?php include('scripts/inicio.php') ?>



        <script>
function myFunction()

{
var bt = document.getElementById('btSubmit');

    if (<?php  echo $lista->Qtdpessoa; ?> >= <?php  echo $lista->Total_lugares; ?>)
    {
        bt.disabled = true;
        {alert("Carro Lotado!\nPor Favor, entre em Contato!" );}
         
    }
    else
    {
        bt.disabled = True;
        

    }
}



</script>






    <title>Entrar</title>
  </head>
  <body>
     <div class="container">
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8">
                  <a href="indexL.php" class="btn btn-primary">Voltar</a>
                    <hr class="new1"> 
                </div>
                    
                    <div class="col-md-4">
                         <a href="http://www.novalima.mg.gov.br/" target="_blank" class="thumbnail" >
                <img data-src="holder.js/100%x180" />
   
                <img src="imagens/logo.png" class="img-responsive" alt="PMNL" />
                         </a>
                        
                    </div>
            </div> 

    <form action="entrar.php?Id=<?php echo $lista->id; ?>" method="post" class="padding-center" style="top: 0;">
        <div class="form-row">




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






<div class="form-group col-md-12">
  <div class="form-group-prepend">
<label>Nome:</label><br> <input class="form-control" value="<?php if($_SESSION['username'] == null){echo 'Agendar';}else{echo $_SESSION['username'];} ?>"  disabled>
</div><br><br>
   <label> Já ocupam o Carro: </label><br><input class="form-control" value="<?php echo $lista->Pessoas_carro; ?>" class="form-control"  disabled>
<input type="hidden" name="pessoas_carro" value=" <?php echo $lista->Pessoas_carro; ?> - <?php if($_SESSION['username'] == null){echo 'Agendar';}else{echo $_SESSION['username'];} ?>" class="form-control" name="nome1" id="nome1" id="nome">
</div><br><br><br>




         
                  <div class="form-group col-md-6">
                <label for="txtHorario">Horario de Saida:</label>
                <input type="time" value="<?php echo $lista->Horario_saida; ?>" class="form-control" id="txtHorario_saida" name="horario_saida" disabled>
                <input type="hidden" name="horario_saida" value="<?php echo $lista->Horario_saida; ?>">
            </div>


                  <div class="form-group col-md-6">
                <label for="txtHorario">Horario de Retorno:</label>
                <input type="time" value="<?php echo $lista->Horario_retorno; ?>" class="form-control" id="txtHorario_retorno" name="horario_retorno" disabled>
                <input type="hidden" name="horario_retorno" value="<?php echo $lista->Horario_retorno; ?>">
            </div>





                  <div class="form-group col-md-6">
                         
                <label for="txtQtdpessoa">Quantidade de pessoas que vão no Carro:</label>
                <input name="qtdpessoa" class="form-control" value="<?php  echo $lista->Qtdpessoa; ?>" disabled>
                <input type="hidden" name="qtdpessoa" class="form-control" value="<?php  echo $lista->Qtdpessoa; ?>">
           
            </div>


             <div class="form-group col-md-6">
                <label for="txtHorario">Data:</label>
                <input type="data_saida" value="<?=date('d/m/Y', strtotime( $lista->start)); ?>" class="form-control" id="txtHorario_saida" name="Start" disabled>
                <input type="hidden" name="Start" value="<?php echo $lista->start; ?>">
            </div>
        

                                <div class="form-group col-md-6">
                <label for="txtLocal">Local de Origem:</label>
                <input type="text" value="<?php echo $lista->Local_saida; ?>" class="form-control" id="txtLocal" name="local_saida" disabled >
                <input type="hidden" name="local_saida" value="<?php echo $lista->Local_saida; ?>">
            </div>
                    <div class="form-group col-md-6">
                <label for="txtLocal">Local de Destino:</label>
                <input type="text" value="<?php echo $lista->title; ?>" class="form-control" id="txtLocal" name="Title" disabled >
                <input type="hidden" name="Title" value="<?php echo $lista->title; ?>">
            </div>


 <div class="form-group col-md-12">
                <label for="txtNome">Obsevação:</label>
             
                <input type="text" value="<?php echo $lista->Observacao; ?>" class="form-control"  name="observacao" title="Proibida a utilização de Caracteres Especiais" disabled>
                
              </div>
  <div class="form-group col-md-6">
                
                <input type="hidden" class="form-control" id="txtLocal" name="motorista" value="<?php echo $lista->Motorista; ?>" >
            </div>



       
            <div class="col-md-12">
                <button onclick="myFunction(qtdpessoa.value)" type="submit" class="btn btn-primary col-md-12" 
                name="salvar" id="btSubmit"/>Entrar</button>
                            </div>
           
        </div>
    </form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
