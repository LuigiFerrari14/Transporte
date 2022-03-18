<?php include('server.php') ?>
<?php include('scripts/inicio.php') ?>
        <title>Login</title>
      </head>

    <body>


<div class="container">
            
            <div class="row">
                
                <div class="col-md-8 col-lg-8">
                  <a href="index.php" class="btn btn-primary">Voltar</a>
                    <hr class="new1"> 
                </div>
                    
                    <div class="col-md-4">
                         <a href="http://www.novalima.mg.gov.br/" target="_blank" class="thumbnail" >
                <img data-src="holder.js/100%x180" />
   
                <img src="imagens/logo.png" class="img-responsive" alt="PMNL" />
                         </a>
                        
                    </div>
            </div> 




    	<div id="padding-center">

<center><h1>Login</h1></center>
<br>

<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">

  <form method="post" action="login.php">
    <?php include('errors.php'); ?>

    <div class="form-group">
      <label>Nome</label>
      <input type="text" name="username" class="form-control" >
    </div>

    <div class="form-group">
      <label>Senha</label>
      <input type="password" name="senha" class="form-control">
    </div><br>



    <div class="form-group">
    	<div class="row">

	<div class="col-md-12">
		
      <button type="submit" class="btn btn-primary btn-block" name="login_user">Login</button>
      <br><br>
    </div>

   		<div class="col-md-6">
    <p>
      Ainda não é um membro?  <a href="register.php"><u>Cadastrar</u></a>
    </p>
		</div>
		<div class="col-md-6">
     <p>
     Esqueci minha Senha  <a href="esquecisenha.php"><u>Redefinir senha</u></a>
    </p>
		</div>
    <br><br>
        <div class="col-md-12">
     <p>
       <a href="logadm.php"><u>Logar como Administrador</u></a>
      
    </p>
    </div>





  </form>
</body>
</html>
