<?php

include 'conexoes/conexao.php';



if(isset($_GET["salvar"])){
$inicio = $_GET['data_inicial'];
$fim = $_GET['data_final'];
$motori = $_GET['motor'];


if ($motori == ''){
        $sql7="SELECT count(id) AS total7 from usuario where (start BETWEEN '$inicio' AND '$fim')";
    
    }elseif($inicio == '' AND $fim == ''){
        $sql7="SELECT count(id) AS total7 from usuario where Motorista = '$motori' or Motorista2 = '$motori'";
    }else{
        $sql7="SELECT count(id) AS total7 from usuario where (start BETWEEN '$inicio' AND '$fim') AND Motorista = '$motori' or Motorista2 = '$motori'";
    }  


    $result7=mysqli_query($conn,$sql7);
    $values7=mysqli_fetch_assoc($result7);
    $num_rows7=$values7['total7'];
    

$query = "SELECT COUNT(`id`) as totalregistros, 
       MONTHNAME(start) AS `Mes` 
FROM   usuario where (start BETWEEN '$inicio' AND '$fim')
GROUP  BY YEAR(`start`), 
          MONTH(`start`) ";  
 $result = mysqli_query($conn, $query); 



$query1 = "SELECT mot1 as motorista, count(mot1) AS total from total_viagens where (data_marcada BETWEEN '$inicio' AND '$fim') group by (mot1)";  
 $result1 = mysqli_query($conn, $query1); 


    //chamar o arquivo cargos.php
    require_once "usuarios.php";
    //criar um objeto do tipo cargo
    $usuario = new Usuarios();

    $lista = $usuario->listarTodosRelatorio();
    $lista2 = $usuario->listarTodosData();
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
    google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([

         ['Mes', 'totalregistros'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Mes"]."', ".$row["totalregistros"]."],";  
                          }  
                          ?>  


        ]);

        var options = {
          width: 1135,
          legend: { position: 'none' },
          chart: {
            title: 'Total de Registros por Mês',
            subtitle: 'Quantidade' },
          axes: {
            x: {
              0: { side: 'top', label: 'Relatorio'} // Top x-axis.
            }
          },
          bar: { groupWidth: "25%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));







         var data = new google.visualization.arrayToDataTable([

         ['motorista', 'total'],  
                          <?php  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row["motorista"]."', ".$row["total"]."],";  
                          }  
                          ?>  


        ]);

        var options = {
          width: 1200,
          legend: { position: 'none' },
          chart: {
            title: 'Total de Viagens feitas por cada Motorista',
            subtitle: 'Quantidade' },
          axes: {
            x: {
              0: { side: 'top', label: 'Relatorio Motorista'} // Top x-axis.
            }
          },
          bar: { groupWidth: "25%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_y_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));


      };

</script>
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

    <a href="relatorio.php" class="btn btn-primary" >Voltar</a>
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
                    <div class="col-md-12">
            <div class="panel panel-primary">


            <table class="table table-striped table table-bordered table-hover table-responsive">

                        
                         <td><center>Transporte Interno - Secretaria de Educação</center></td>


            </table>
        
    </div>
</div>



        <div class="col-md-12">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Relatorio Geral - <?=date('d/m/Y', strtotime($inicio)); ?> à <?=date('d/m/Y', strtotime($fim));?> - <?php echo $motori; ?></h3>
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
                        
                        <td><?php echo $num_rows7;?></td>         
                    </tr>


                </tbody>
            </table>


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
                    <?php if($lista) : ?>
                    <?php foreach ($lista as $usuarios) :?>

                    <tr>
                        
                        <td><?php echo $usuarios->Nome; ?></td>
                          
                        <td><?=date('d/m/Y H:i', strtotime($usuarios->Data_marcada)); ?></td>
                      
                        <td><?=date('d/m/Y', strtotime($usuarios->start)); ?></td>
                        <td><?=date(' H:i', strtotime($usuarios->Horario_saida)); ?></td>
                        <td><?=date(' H:i', strtotime($usuarios->Horario_retorno)); ?></td>
                        <td><?php echo $usuarios->Qtdpessoa; ?></td>
                        <td><?php echo $usuarios->Local_saida; ?></td>
                        <td><?php echo $usuarios->title; ?></td>
                        <td><?php echo $usuarios->Motorista; ?></td>

                       
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

<div id="top_x_div" style=" height: 500px;"></div><br><br><br><br><br><br><br><br><br><br><br><br><br>


<label>                                                                                                                                                                                                                                                          </label>

<br><br><br><br><br><br><br><br><br><br><br><br><br>




    <div id="top_y_div" style=" height: 500px;"></div><br><br><br><br><br><br>
  
</div>

</body>
</html>

          