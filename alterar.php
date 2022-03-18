<?php
    //chamar a classe 
    require_once "usuarios.php";
    //criar um objeto do tipo cargo
    $usuario = new Usuarios();
    //passsando como parm o codigo escolhido pelo user no index
    if(isset($_GET["codigo"])){
        $lista = $usuario->listarCodigo($_GET['codigo']);
    //chamar a funcao inserir verificando se o usuario clicou no botao salvar
    }
    if(isset($_POST["salvar"])){
        $usuario->alterar();
    }
?>
<?php include('scripts/inicio.php') ?>

    <title>Cadastro</title>
  </head>
  <body>

    <form action="alterar.php?codigo=<?php echo $lista->Codigo; ?>" method="post" class="padding-center" style="top: 0;">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtNome">Nome:</label>
                <input type="text" value="<?php echo $lista->Nome; ?>" class="form-control" id="txtNome" name="nome">
            </div>
                  <div class="form-group col-md-6">
                <label for="txtHorario">Horario:</label>
                <input type="time" value="<?php echo $lista->Horario; ?>" class="form-control" id="txtHorario" name="horario">
            </div>
                  <div class="form-group col-md-6">
                <label for="txtQtdpessoa">Quantidade de pessoas que vão no Carro:</label>
                <select name="qtdpessoa" class="form-control" placeholder="--:--" value="<?php echo $lista->Qtdpessoa; ?>">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
             <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                </select>
            </div>
                    <div class="form-group col-md-6">
                <label for="txtLocal">Local:</label>
                <input type="text" value="<?php echo $lista->Local; ?>" class="form-control" id="txtLocal" name="local">
            </div>

             <div class="form-group col-md-6">
                <label for="txtNome">Motorista:</label>
                <input type="text" class="form-control" id="txtLocal" name="motorista">
            </div>

        
        </div>
        <div class="form-row">
            <div class="col">
                <button type="submit" class="btn btn-primary col-md-12" 
                name="salvar">Alterar</button>
                            </div>
            <div class="col">
                <a href="index.php" class="btn btn-danger col-md-12">Sair</a>
            </div>
        </div>
    </form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>