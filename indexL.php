<?php
include_once("conexoes/conexao.php");
$result_events = "SELECT id, Local_saida, title, start, Horario_saida, Horario_retorno, Pessoas_carro, Motorista FROM usuario";
$resultado_events = mysqli_query($conn, $result_events);
?>
<?php
    //chamar o arquivo cargos.php
    require_once "usuarios.php";
    //criar um objeto do tipo cargo
    $usuario = new Usuarios();
    $motivo = new Motivos();
    //chamar a funcao listarTodos()
    $lista = $usuario->listarTodos();
    $lista2 = $usuario->listarTodosData();

    //chamar a funcao inserir verificando se o usuario clicou no botao salvar
if(isset($_GET["salvar"])){
    $motivo->inserir();
}
?>
<?php
session_start();

if ( !isset($_SESSION['username'])  ){
    header("Location: ./login.php");
    exit;
}

?>
<?php include('scripts/indexstyle.php'); ?>
<script>
function teste() {

  

   $('#btnsubmit').on('click',function()
  {
    $(this).val('Aguarde ...')
      .attr('disabled','disabled');
    $('#theform').submit();
  });

alert('Saida requisitado com Sucessos!');
  
}
</script>

    <title>Agenda Logado</title>
</head>


<body>


<div class="container">
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8">

            <a href="cadastrar(logado).php" class="btn btn-primary">Agendar</a>
            <a class="btn btn-primary"> <?php if($_SESSION['username'] == null){echo 'Agendar';}else{echo $_SESSION['username'];} ?></a>

                                              <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Sair do Carro</button>
                    
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sair do Carro</h4>
        </div>
        <div class="modal-body">
          
 <form action="indexL.php" method="get" class="padding-center" style="top: 0;" onsubmit="teste()">
      <input type="hidden" name="marcou" value="<?php if($_SESSION['username'] == null){echo 'Agendar';}else{echo $_SESSION['username'];} ?>">

      <div class="form-group col-md-12">
                <label for="txtNome">Nome(s):</label>
                <input type="text" class="form-control"  name="nome" required="required"><span class="required"></span>
            </div>
            
            
            <div class="form-group col-md-12">
                <label for="txtNome">Motivo:</label>
                <textarea rows="5"  class="form-control"  name="motivo" required="required"></textarea>
            </div>


            <div class="form-group col-md-12">                
                <label for="txtModelo1">Selecione a viagem na qual deseja sair:</label>
                <select class="form-control" name="id_transporte" required>
                    <?php

          $nomeusuario = $_SESSION['username'];
           echo $nomeusuario;

                    $result_cat_post = "SELECT * FROM usuario where Nome = '$nomeusuario' ";
                    $resultado_cat_post = mysqli_query($conn, $result_cat_post);
                    while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ){ ?>
                    <option value="<?php echo $row_cat_post['id']; ?>"><?=date('d/m/Y', strtotime( $row_cat_post['start'])); echo ' // Lugar: ';  echo $row_cat_post['title'] ; echo ' // Saida: '; echo $row_cat_post['Horario_saida'] ; echo ' // Nomes: '; echo $row_cat_post['Pessoas_carro'] ;?>
                    </option><?php
                    }
                    ?>
                </select>
            </div>



 <input id='btnsubmit' type="submit" class="btn btn-primary col-md-12" name="salvar" value="Sair do Carro"/><br><br>
</form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>

             <div id="mySidenav" class="sidenav">
          <p> <a href="logout.php" style="color: red;">Sair</a> </p>
      

  
                  <hr class="new1"> 
                </div>   
                </div>
                    
                    <div class="row">
                    <div class="col-md-4">
                         <a href="http://www.novalima.mg.gov.br/" target="_blank" class="thumbnail" >
                <img data-src="holder.js/100%x180" />
   
                <img src="imagens/logo.png" class="img-responsive" alt="PMNL" />
                         </a>
                        
                    </div>
            </div> 

<?php //vizualização do Post
include("viewpost.php"); ?>


<div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Calendário</h3>
                    </div>
<div class="panel-body">
<div id='calendar'></div>
<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Dados do Evento</h4>
					</div>
					<div class="modal-body">
						<dl class="dl-horizontal">
                            
<input type="hidden" class="form-control" name="id" id="id" value="">

							<dt>Nome(s):</dt>
                            <dd id="Nome"></dd>
                            <dd id="Pessoas_carro"></dd>
                            <dt>Origem:</dt>
                            <dd id="Local_saida"></dd>
                            <dt>Destino:</dt>
                            <dd id="title"></dd>
                            <dt>Data:</dt>
                            <dd id="start"></dd>
                            <dt>Saída:</dt>
                            <dd id="Horario_saida"></dd>
                            <dt>Retorno:</dt>
                            <dd id="Horario_retorno"></dd>
                            <dt>Motorista:</dt>
                            <dd id="Motorista"></dd>
                            <div class="col-md-7"></div>
                            <div class="col-md-5">
                         
                             <a  href="entrar.php" onclick="this.href='entrar.php?Id='+document.getElementById('id').value" class="btn btn-sm btn-info" >Entrar</a>

                        

						</dl>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
</div>
</div>

        <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Agenda de Horários</h3>

                    </div>
<div class="panel-body">
<div style="overflow: auto; width: auto; height: 600px; ">
            <table class="table table-striped table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                       
                        
                         <th>Nome(s)</th>
                        <th>Data</th>
                        <th>Hora Saída</th>
                        <th>Hora Retorno</th>
                        <th>Qtd Pessoas</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Motorista</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista2) : ?>
                    <?php foreach ($lista2 as $usuarios) :?>

                    <tr>
                        
                        <td><?php echo $usuarios->Pessoas_carro; ?></td>
                        <td><?=date('d/m/Y', strtotime($usuarios->start)); ?></td>
                        <td><?php echo $usuarios->Horario_saida; ?></td>
                        <td><?php echo $usuarios->Horario_retorno; ?></td>
                        <td><?php echo $usuarios->Qtdpessoa; ?></td>
                        <td><?php echo $usuarios->Local_saida; ?></td>
                        <td><?php echo $usuarios->title; ?></td>
                        <td><?php echo $usuarios->Motorista; ?></td>
                        <td><?php echo $usuarios->Status; ?></td>
                        <td>

                        <a href="entrar.php?Id=<?php echo $usuarios->id; ?>" class="btn btn-sm btn-info" name="entrar">Entrar</a>
                        </td>
                    
                     
                    </tr>

                    <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="8">Nenhum registro encontrado</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
			</div>
        </div>
    </div>
</div>
</div>

	</body>
</html>
