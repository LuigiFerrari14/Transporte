<?php
    //chamar o arquivo cargos.php
    require_once "usuarios.php";
    //criar um objeto do tipo cargo
    
    $usuario3 = new Usuarios3(); 
    //chamar a funcao listarTodos()
    

    //chamar a fucao excluir passando o codigo escolhido pelo usuario
    if(isset($_GET["id"])){
        $usuario3->excluirr($_GET["id"]);
    }
?>

<?php include('scripts/inicio.php') ?>
<script>

    
</script>



        <title>Chat</title>
</head>
<body>
<div class="container">
     <div class="row">
                
                <div class="col-md-8 col-lg-8">
            <a href="indexADMIN.php" class="btn btn-primary">Voltar</a>
            
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






<?php include('conexoes/conexao1.php'); ?>

    <div class="form-group">
        <form action="" method="post" name="form1">
      
        <input type = "hidden" class="form-control" value="ADMIN" disabled>
                <input type="hidden" name="nome" value="ADMIN">
<BR>

        <label>Mensagem:</label>
        <textarea rows="5" cols="50" input type="text" name="mensagem" class="form-control""></textarea>
    </div>

    <button type="submit" class="btn btn-primary btn-block" name="enviar">Enviar</button>

    <form action='deletarblog.php' method='post'>

    
</div>


<br><br>
        <div class="col-md-12">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Quadro de Avisos</h3>
                    </div>
<div class="panel-body">

            <table class="table table-striped table table-bordered table-hover table-responsive">
                    <tr>

                <thead> <th>Data</th>
                        <th>Mensagem</th>
                            </tr>
                </thead>
                
<?php if ($rows) : ?>

<?php foreach ($rows as $row) : ?>
<tr>
        <td><?php echo $row->data; ?></td>
        <td><?php echo $row->mensagem; ?></td>
    <td>
        

        <a href="blogADMIN.php?id=<?php echo $row->id; ?>" class="btn btn-sm btn-danger" >Excluir</a>
    </td>
</tr>

   <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="3">Nenhum registro encontrado</td>
                    </tr>
                    <?php endif; ?>







</table>
</div>
</div>
</body>
</html>