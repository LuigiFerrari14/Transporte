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
    //chamar a funcao listarTodos()
    $lista = $usuario->listarTodos();

    //chamar a fucao excluir passando o codigo escolhido pelo usuario
    if(isset($_GET["Id"])){
        $usuario->excluir($_GET["Id"]);
    }
?>
<?php include('scripts/indexstyle.php'); ?>
<title>Agenda</title>
	</head>
	<body>
<div class="container">
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8">
            <a href="login.php" class="btn btn-primary">Agendar</a>
            <a href="login.php" class="btn btn-primary">Conta</a>
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



<?php //vizualização do Post
include("viewpost.php"); ?>


<div class="row">
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
                        </dl>
                    </div>
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
                        <h3 class="panel-title painel-title-responsive">Agenda de Horários</h3>
                    </div>
<div class="panel-body">
<div style="overflow: auto; width: auto; height: 600px; ">
            <table class="table table-striped table table-bordered table-hover table-responsive">
                    <tr>

                <thead> 
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Hora Saida</th>
                        <th>Hora Retorno</th>
                        <th>Qtd Pessoas</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Motorista</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista) : ?>
                    <?php foreach ($lista as $usuarios) :?>

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
