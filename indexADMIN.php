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
$lista3 = $motivo->listarTodos();

    //chamar a fucao excluir passando o codigo escolhido pelo usuario
    if(isset($_GET["Id"])){
        $usuario->excluir($_GET["Id"]);
    }

        if(isset($_GET["id"])){
        $motivo->excluir($_GET["id"]);
    }
?>

<?php
session_start();

if ( !isset($_SESSION['usernameadm'])  ){
    header("Location: ./login.php");
    exit;
}

?>
<?php include('scripts/indexstyle.php'); ?>
    <title>Agenda ADM</title>
</head>
<body>

     <div class="container">
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8">
           <a href="cadastrar.php" class="btn btn-primary">Agendar</a>

    <a href="blogADMIN.php" class="btn btn-primary" >Mensagem</a>
    <a href="relatorio.php" class="btn btn-primary" >Relatorio</a>
    <a href="cadastrarmotorista.php" class="btn btn-primary" >Motoristas</a>

            <p> <a href="logout.php" style="color: red;">Sair</a> </p>
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





<?php include ('viewpost.php'); ?>




 <div class="col-md-6">
     <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Calendário</h3>
                    </div>
<div class="panel-body">

            <table class="table table-striped table table-bordered table-hover table-responsive">
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
							<dt>Nome:</dt>
							<dd id="Nome"></dd>
							<dd id="Pessoas_carro"></dd>
                            <dt>Origem:</dt>
                            <dd id="Local_saida"></dd>
							<dt>Destino:</dt>
							<dd id="title"></dd>
							<dt>Data:</dt>
							<dd id="start"></dd>
							<dt>Saida:</dt>
							<dd id="Horario_saida"></dd>
							<dt>Retorno:</dt>
							<dd id="Horario_retorno"></dd>
                            <dt>Motorista:</dt>
                            <dd id="Motorista"></dd>
							<div class="col-md-7"></div>
							<div class="col-md-5">
             <a  href="alterarADMIN.php" onclick="this.href='alterarADMIN.php?Id='+document.getElementById('id').value" class="btn btn-sm btn-info" >Alterar</a>
             <a href="indexADMIN.php" onclick="this.href='indexADMIN.php?Id='+document.getElementById('id').value" class="btn btn-sm btn-danger" >Excluir</a>

                        

                        </dl>
					</div>
				</div>
			</div>
</dl>
</div>
</div>
</div>
</div>
</table>
</div>
</div>
</div>


<div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Justificativas de Desistências</h3>
                    </div>
<div class="panel-body">
<div style="overflow: auto; width: auto; height: 200px; ">
            <table class="table table-striped table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        
                        <th>Marcou</th>
                        <th>Desistente</th>
                        <th>Motivo</th>
                        <th>Horario</th>
                        <th>Viagem</th>
  
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista3) : ?>
                    <?php foreach ($lista3 as $motivo) : ?>
                    <tr>
                        <td><?php echo $motivo->Marcou; ?></td>
                        <td><?php echo $motivo->Nome; ?></td>
                        <td><?php echo $motivo->Motivo; ?></td>
                      
                        <td><?=date('d/m/Y H:i:s', strtotime($motivo->Horario)); ?></td>
                        
                        <td><a href="alterarADMIN.php?Id=<?php echo $motivo->Id_transporte; ?>" class="btn btn-sm btn-primary" name="alterar">Ver</a>
                            <a href="indexADMIN.php?id=<?php echo $motivo->Id; ?>" class="btn btn-sm btn-danger" >Excluir</a>
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
                        
                        <th>Marcou</th>
                        <th>Nome</th>
                        <th>Data Marcada</th>
                        <th>Data Agnd</th>
                        <th>Saida</th>
                        <th>Retorno</th>
                        <th>Qtd Pessoas</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Motorista</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista2) : ?>
                    <?php foreach ($lista2 as $usuarios) : ?>
                    <tr>
                        <td><?php echo $usuarios->Nome; ?></td>
                          <td><?php echo $usuarios->Pessoas_carro; ?></td>
                        <td><?=date('d/m/Y H:i:s', strtotime($usuarios->Data_marcada)); ?></td>
                      
                        <td><?=date('d/m/Y', strtotime($usuarios->start)); ?></td>
                        <td><?php echo $usuarios->Horario_saida; ?></td>
                        <td><?php echo $usuarios->Horario_retorno; ?></td>
                        <td><?php echo $usuarios->Qtdpessoa; ?></td>
                        <td><?php echo $usuarios->Local_saida; ?></td>
                        <td><?php echo $usuarios->title; ?></td>
                        <td><?php echo $usuarios->Motorista; ?></td>
                        <td><?php echo $usuarios->Status; ?></td>
                        <td>
                            <a href="alterarADMIN.php?Id=<?php echo $usuarios->id; ?>" class="btn btn-sm btn-primary" name="alterar">Alterar</a>
                            <a href="indexADMIN.php?Id=<?php echo $usuarios->id; ?>" class="btn btn-sm btn-danger" >Excluir</a>

                            

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


	</body>
</html>
