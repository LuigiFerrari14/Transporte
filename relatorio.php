<?php 
include 'conexoes/conexao.php';

        $sql="SELECT count(id) AS total from usuario";
        $result=mysqli_query($conn,$sql);
        $values=mysqli_fetch_assoc($result);
        $num_rows=$values['total'];
        ?>


<?php
    //chamar o arquivo cargos.php
    require_once "usuarios.php";
    //criar um objeto do tipo cargo
    $usuario = new Usuarios();
    //chamar a funcao listarTodos()
    $lista = $usuario->listarTodos();
$lista2 = $usuario->listarTodosData();

?>


<?php
session_start();

if ( !isset($_SESSION['usernameadm'])  ){
    header("Location: ./login.php");
    exit;
}

?>
<?php include('scripts/indexstyle.php'); ?>
    <title>Relatorio</title>
    <style>
                @media print { 
                    #noprint { display:none; } 
                    body { background: #fff; }
                }
            </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css" rel="stylesheet" />
<style>
  @page {
    size: A4

  }
</style>
 <script>

function myFunction() {
  window.print();
}
</script>

</head>
<body class="A4 landscape">

     <div class="container">
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8">
                     <div id="noprint">

    <a href="indexADMIN.php" class="btn btn-primary" >Voltar</a>
     <button onclick="myFunction()"><i class="fa fa-print" style="font-size:22px"></i></button>
                   

            <p> <a href="logout.php" style="color: red;">Sair</a> </p>
                    </div>
            <hr class="new1">      
                </div>
                    <div class="row">
                    <div class="col-md-4">
                         <a  class="thumbnail" >
                <img data-src="holder.js/100%x180" />
   
                <img src="imagens/logo.png" class="img-responsive" alt="PMNL" />
                         </a>
                        
                    </div>
            </div> 







            <br><br>
        <div class="col-md-4">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Relatorio Geral - Tempo Todo</h3>
                    </div>
<div class="panel-body">

            <table class="table table-striped table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                       
                        
                         <th>Total de Registros</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td><?php echo $num_rows;?></td>         
                    </tr>


                </tbody>
            </table>


        </div>
    </div>
</div>
 <div id="noprint">
        <div class="col-md-8">
             <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Filtrar</h3>
                    </div>
<div class="panel-body">
             <div class="row">
        <form action="resultado.php" method="get" class="padding-center" style="top: 0;">
            <div class="col-md-6">
        <label >Data Inicial:</label>
         <input type="date" class="form-control" name="data_inicial" id="data_inicial">
            </div>
            <div class="col-md-6">
            <label >Data Final:</label>
          <input type="date" class="form-control" name="data_final" id="data_final">
           <br>
              <label >Motorista:</label>
          <input type="text" class="form-control" name="motor" id="motor">
            </div>
          <br><br><br><br>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary col-md-12" name="salvar">Filtrar por Data</button>
        </div>
        </form>
            </div>
        </div>
</div>
</div>
</div>

        <div class="col-md-12">
            
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Agenda de Horários</h3>
                    </div>
<div class="panel-body">

           <table style="width: 100%; " border="0" rules="0" cellspacing="0" cellpadding="0" align="center" class="table table-striped table table-bordered table-hover table-responsive " >
                <thead>
                    <tr>
                        
                        
                        <th>Nome</th>
                        <th>Data Marcada</th>
                        <th>Data Agnd</th>
                        <th>Saida</th>
                        <th>Retorno</th>
                        <th>Qtd Pessoas</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Motorista</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista2) : ?>
                    <?php foreach ($lista2 as $usuarios) : ?>
                    <tr>
                        <td><?php echo $usuarios->Nome; ?></td>
                          
                        <td><?=date('d/m/Y H:i:s', strtotime($usuarios->Data_marcada)); ?></td>
                      
                        <td><?=date('d/m/Y', strtotime($usuarios->start)); ?></td>
                        <td><?php echo $usuarios->Horario_saida; ?></td>
                        <td><?php echo $usuarios->Horario_retorno; ?></td>
                        <td><?php echo $usuarios->Qtdpessoa; ?></td>
                        <td><?php echo $usuarios->Local_saida; ?></td>
                        <td><?php echo $usuarios->title; ?></td>
                        <td><?php echo $usuarios->Motorista; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
    
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

