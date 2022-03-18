<?php
//chamar a classe 
require_once "usuarios.php";

//criar um objeto do tipo cargo
$usuario = new Usuarios();
//chamar a funcao inserir verificando se o usuario clicou no botao salvar
if(isset($_GET["salvar"])){
    $usuario->inserir();
}
?>
<?php include('scripts/inicio.php') ?>

<!-- var e=this;setTimeout(function(){e.disabled=true;},0);return true; -->
<script>
function teste() {

  

   $('#btnsubmit').on('click',function()
  {
    $(this).val('Aguarde ...')
      .attr('disabled','disabled');
    $('#theform').submit();
  });


  
}
</script>

    <title>Agendamento</title>
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

    
    <form action="cadastrar(logado).php" method="get" class="padding-center" style="top: 0;" onsubmit="teste()">
        <div class="form-row">
         



<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "";
    header('location: login.php');
  }
  ?>


               <input type="hidden" class="form-control" value="<?php if($_SESSION['username'] == null){echo 'Agendar';}else{echo $_SESSION['username'];} ?>" name="nome2" id="nome2" disabled>
                <input type="hidden" name="nome" value="<?php if($_SESSION['username'] == null){echo 'Agendar';}else{echo $_SESSION['username'];} ?>">
            
            
            <div class="form-group col-md-6">
                <label for="txtNome">Pessoas que irão no Veículo:</label>
                <input type="text" class="form-control" id="txt1" name="pessoas_carro" pattern="^[-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Separe os nomes com '-'" required="required"><span class="required"></span>
            </div>
                     <div class="form-group col-md-6">
                <label for="txtNome">Data:</label>
                <input type="date" class="form-control" id="txt1" name="Start" required="required"><span class="required"></span>
            </div>
            

              <div class="form-group col-md-6">
                <label for="txtNome">Horário de Saída:</label>
                <input type="time" class="form-control" id="txt2" placeholder="--:--" name="horario_saida" required="required"><span class="required"></span>
            </div>

              <div class="form-group col-md-6">
                <label for="txtNome">Horário de Retorno:</label>
                <input type="time" class="form-control" id="txt3" placeholder="--:--" name="horario_retorno" required="required"><span class="required"></span>
            </div>
             <div class="form-group col-md-6">
                <label for="txtNome">Local de Saida:</label>
                <input value="Semed" type="text" class="form-control" id="txt4" name="local_saida" pattern="^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Proibida a utilização de Caracteres Especiais" required="required"><span class="required"></span>
            </div>
  
          <div class="form-group col-md-6">
                <label for="txtNome">Local de Destino:</label>
                <input type="text" class="form-control" id="txt4" name="Title" pattern="^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" title="Proibida a utilização de Caracteres Especiais" required="required"><span class="required"></span>
            </div>
            <div class="form-group col-md-12">
            <label for="txtQtdpessoa">Quantidade de pessoas que irão no Veículo:</label>
            <input type="text" class="form-control" id="txt5" name="qtdpessoa"  pattern="[0-9]+" title="Somente Números" required="required"><span class="required"></span>
           
                           <div class="form-group col-md-12">
                <label for="txtNome">Obsevação:</label>
             
                <textarea rows="5"  class="form-control"  name="observacao"></textarea>
                
              </div>


        </div>

             <div class="form-group col-md-6">
                
                <input type="hidden" class="form-control" id="txtLocal" name="motorista" value="A_definir">

                <input type="hidden" class="form-control" id="txtLocal" name="motorista2" value="A_definir">
            </div>
            <div class="form-group col-md-6">
                
                <input type="hidden" class="form-control" id="txtTotal_lugares" name="total_lugares" value="4" >
            </div>

            <div class="form-group col-md-6">
                
                <input type="hidden" class="form-control" id="txtstatus" name="status" value="Em_analise" >
            </div>


<div class="form-group col-md-10"></div>

        <div class="form-row">
            <div class="col">
              
                <input id='btnsubmit' type="submit" class="btn btn-primary col-md-12" name="salvar" value="Agendar"  />
            </div>

        </div>
    </div>
    </form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
