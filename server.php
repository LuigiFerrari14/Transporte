<?php
session_start();

// initializing variables
$username = "";
$email    = "";





$errors = array(); 

// connect to the database
include('conexoes/conexao3.php');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $senha_1 = mysqli_real_escape_string($db, $_POST['senha_1']);
  $senha_2 = mysqli_real_escape_string($db, $_POST['senha_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username obrigatório"); }
  if (empty($email)) { array_push($errors, "Email obrigatório"); }
  if (empty($senha_1)) { array_push($errors, "Senha obrigatório"); }
  if ($senha_1 != $senha_2) {
  array_push($errors, "As senhas não conferem");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM usuario1 WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username já cadastrado");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email já cadastrado");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $senha = ($senha_1);//encrypt the senha before saving in the database

    $query = "INSERT INTO usuario1 (username, email, senha) 
          VALUES('$username', '$email', md5('$senha'))";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Você está logado";
    header('location: index.php');
    
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $senha = mysqli_real_escape_string($db, $_POST['senha']);

  if (empty($username)) {
    array_push($errors, "Username obrigatório");
  }
  if (empty($senha)) {
    array_push($errors, "senha obrigatório");
  }

  if (count($errors) == 0) {
    $senha =($senha);
    $query = "SELECT * FROM usuario1 WHERE username='$username' AND senha=md5('$senha')";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Você está logado";
      header('location: indexL.php');
    }else {
      array_push($errors, "Username ou Senha incorretos");
    }
  }


}


 //MUDAR SENHA
if (isset($_POST['mudar_senha'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $senha = mysqli_real_escape_string($db, $_POST['senha']);

  if (count($errors) == 0) {
    
    $query = ("UPDATE usuario1 SET senha = md5('$senha') WHERE email = '$email'");
    $results = mysqli_query($db, $query);

  }
}

?>