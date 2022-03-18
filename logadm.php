<?php include('conflogadm.php') ?>
<?php include('scripts/inicio.php') ?>
        <title>Login do ADM</title>
      </head>


    <body>
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

      <div id="padding-center">

<center><h1>Login Administrador</h1></center>
<br>


<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

  <form method="post" action="logadm.php">
    <?php include('errors.php'); ?>

    <div class="form-group">
      <label>Username</label>
      <input type="text" name="usernameadm" class="form-control" >
    </div><br>

    <div class="form-group">
      <label>Senha</label>
      <input type="password" name="senhaadm" class="form-control">
    </div>
<br>

     <div class="form-group">
      <div class="row">

  <div class="col-md-12">
  
      
      <button class="btn btn-primary col-md-12" type="submit" class="btn btn-primary btn-block"  name="login_admin">Login</button>
    </div>


          </div>
</div>
      </div>

  </form>
</body>
</html>