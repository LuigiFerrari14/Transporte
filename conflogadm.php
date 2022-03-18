<?php
session_start();

// initializing variables



$errors = array(); 

// connect to the database
include('conexoes/conexao3.php');



// LOGIN USER
if (isset($_POST['login_admin'])) {
  $usernameadm = mysqli_real_escape_string($db, $_POST['usernameadm']);
  $senhaadm = mysqli_real_escape_string($db, $_POST['senhaadm']);

  if (empty($usernameadm)) {
    array_push($errors, "Username obrigatório");
  }
  if (empty($senhaadm)) {
    array_push($errors, "senha obrigatório");
  }

  if (count($errors) == 0) {
    $senha = md5($senhaadm);
    $query = "SELECT * FROM useradmin WHERE usernameadm='$usernameadm' AND senhaadm=md5('$senhaadm')";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['usernameadm'] = $usernameadm;
      $_SESSION['success'] = "Você está logado";
   
      header('location: indexADMIN.php');
    }else {
      
      header('location: logadm.php');
    }
  }


}

?>