<?php include('server.php') ?>
<?php include('scripts/inicio.php') ?>
<title>Registrar</title>
        <div class="container">
        <div class="row">
                
                <div class="col-md-8 col-lg-8">
                  <a href="login.php" class="btn btn-primary">Voltar</a>
                    <hr class="new1"> 
                </div>
                    
                    <div class="col-md-4">
                         <a href="http://www.novalima.mg.gov.br/" target="_blank" class="thumbnail" >
                <img data-src="holder.js/100%x180" />
   
                <img src="imagens/logo.png" class="img-responsive" alt="PMNL" />
                         </a>
                        
                    </div>
            </div> 

      <center><h1>Registrar</h1></center>
    </head>
    <body>

<br>

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
  
  <form method="post" action="register.php">
    <?php include('errors.php'); ?>

    <div class="form-group">
      <label>Nome</label>
      <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
    </div>

    <div class="form-group">
      <label>Senha</label>
      <input type="password" class="form-control" name="senha_1">
    </div>

    <div class="form-group">
      <label>Confirmar Senha</label>
      <input type="password" class="form-control" name="senha_2">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block" name="reg_user" >Registrar</button>
    </div>

    <p>
      Já é um membro? <a href="login.php"><u>Entrar</u></a>
    </p>
  </form>
</body>
</html>