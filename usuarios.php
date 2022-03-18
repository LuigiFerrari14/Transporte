<?php

include 'conexoes/conexao2.php';


//criar classe Cargos
class Usuarios{
	//criar atributos/campos da tabela
	public $id;
	public $Nome;
	public $Pessoas_carro;
	public $Horario_saida;
	public $Horario_retorno;
	public $Qtdpessoa;
	public $Local_saida;
	public $title;
	public $Motorista;
	public $Motorista2;
	public $start;
	public $Total_lugares;
	public $Data_marcada;
	public $Status;
	public $Observacao;
	//metodos
	//metodo para selecionar todos os cargos
	public function listarTodos(){
		//criar a conexao com o bd
		$pdo = new PDO(server,usuario,senha);
		//comando sql
		$smtp = $pdo->prepare("select * from usuario order by start DESC");
		//executar comando
		$smtp->execute();
		//verificar se retornou valores
		if($smtp->rowCount() > 0){
			return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
		}
	}

		public function listarTodosRelatorio(){
			$inicio = $_GET['data_inicial'];
			$fim = $_GET['data_final'];
			$motori = $_GET['motor'];

			if($motori == ''){
		//criar a conexao com o bd
		$pdo = new PDO(server,usuario,senha);
		//comando sql
		$smtp = $pdo->prepare("SELECT * from usuario where (start BETWEEN '$inicio' AND '$fim')");
		//executar comando
		$smtp->execute();
		//verificar se retornou valores
		if($smtp->rowCount() > 0){
			return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
		}
	}elseif($inicio == '' AND $fim == ''){
		//criar a conexao com o bd
		$pdo = new PDO(server,usuario,senha);
		//comando sql
		$smtp = $pdo->prepare("SELECT * FROM usuario where Motorista = '$motori' or Motorista2 = '$motori'");
		//executar comando
		$smtp->execute();
		//verificar se retornou valores
		if($smtp->rowCount() > 0){
			return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
	}

	}else {
		//criar a conexao com o bd
		$pdo = new PDO(server,usuario,senha);
		//comando sql
		$smtp = $pdo->prepare("SELECT * from usuario where (start BETWEEN '$inicio' AND '$fim') AND Motorista = '$motori' or Motorista2 = '$motori'");  
		//executar comando
		$smtp->execute();
		//verificar se retornou valores
		if($smtp->rowCount() > 0){
			return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
	}
}
}






	public function listarTodosData(){
		//criar a conexao com o bd
		$pdo = new PDO(server,usuario,senha);
		//comando sql
		$smtp = $pdo->prepare("SELECT * FROM usuario ORDER BY start DESC");
		//executar comando
		$smtp->execute();
		//verificar se retornou valores
		if($smtp->rowCount() > 0){
			return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
		}
	}










	public function inserir(){
		//criar a conexao com o banco de dados
		$pdo = new PDO(server, usuario, senha);
		//verificar se o usuario preencheu os dados no formulario
		if(isset($_GET["nome"]) && isset($_GET["horario_saida"]) && isset($_GET["horario_retorno"]) && isset($_GET["qtdpessoa"]) && isset($_GET["local_saida"]) && isset($_GET["Title"]) && isset($_GET["motorista"]) && isset($_GET["motorista2"]) && isset($_GET["Start"]) && isset($_GET["total_lugares"])  && isset($_GET["status"]) && isset($_GET["pessoas_carro"]) && isset($_GET["observacao"])){
			//preencher os atributos com os valores do formulario
			$this->Nome = $_GET["nome"];
			$this->Horario_saida = $_GET["horario_saida"];
			$this->Horario_retorno = $_GET["horario_retorno"];
			$this->Qtdpessoa = $_GET["qtdpessoa"];
			$this->Local_saida = $_GET["local_saida"];
			$this->title = $_GET["Title"];
			$this->Motorista = $_GET["motorista"];
			$this->Motorista2 = $_GET["motorista2"];
			$this->start = $_GET["Start"];
			$this->Total_lugares = $_GET["total_lugares"];
			$this->Status = $_GET["status"];
			$this->Pessoas_carro = $_GET["pessoas_carro"];
			$this->Observacao = $_GET["observacao"];


			//criar o comando sql
			$smtp = $pdo->prepare("insert into usuario(Id,nome,pessoas_carro,horario_saida,horario_retorno,qtdpessoa,local_saida,Title,motorista,motorista2,Start,total_lugares,data_marcada,status, observacao) values(null,:nome,:pessoas_carro,:horario_saida,:horario_retorno,:qtdpessoa,:local_saida,:Title,:motorista,:motorista2,:Start,:total_lugares,now(),:status,:observacao)");

			//executar o comando no banco de dados passando os valores por parametros
			$res = $smtp->execute(array (
				':nome' => $this->Nome,
				':pessoas_carro' => $this->Pessoas_carro,
				':horario_saida' => $this->Horario_saida,
				':horario_retorno' => $this->Horario_retorno,
				':qtdpessoa' => $this->Qtdpessoa,
				':local_saida' => $this->Local_saida,
				':Title' => $this->title,
				':motorista' => $this->Motorista,
				':motorista2' => $this->Motorista2,
				':Start' => $this->start,
				':total_lugares' => $this->Total_lugares,
				':status' => $this->Status,
				':observacao' => $this->Observacao
			));
//verificar se retornou dados
			if ($smtp->rowCount() > 0) {
				//volta index
				header("location:indexL.php");
			}
		}else{
			header("location:./");
		}







require 'PHPMailer/PHPMailerAutoload.php';


	$Mailer = new PHPMailer();
	
	//Define que serásado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configuraçs
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'smtp.gmail.com';
	//Porta de saida de e-mail 
	$Mailer->Port = 465;
	
	//Dados do e-mail de saida - autenticaç
	$Mailer->Username = 'transporte.educnl@gmail.com';
	$Mailer->Password = '';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticaç)
	$Mailer->From = 'transporte.educnl@gmail.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Transporte SEMED';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Um novo agendamento acaba de ser feito!';
	
	//Corpo da Mensagem
	$Mailer->Body = 'Detalhes:' . '<br>' .'Nome: ' . $_GET["nome"]  . '<br>' . 'Local: ' . $_GET["Title"] . '<br>' . 'Data: ' . $_GET["Start"] . '<br>' . 'Saí: ' . $_GET["horario_saida"] . '<br>' . 'Retorno: ' . $_GET["horario_retorno"];
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'Fim...';
	
	//Destinatario 
	$Mailer->AddAddress('transporte.educnl@gmail.com');
	
	if($Mailer->Send()){
		echo "Pedido cadastrado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
	
		
	
	}


public function inseriradm(){
		//criar a conexao com o banco de dados
		$pdo = new PDO(server, usuario, senha);
		//verificar se o usuario preencheu os dados no formulario
		if(isset($_GET["nome"]) && isset($_GET["horario_saida"]) && isset($_GET["horario_retorno"]) && isset($_GET["qtdpessoa"]) && isset($_GET["local_saida"]) && isset($_GET["Title"]) && isset($_GET["motorista"]) && isset($_GET["motorista2"]) && isset($_GET["Start"]) && isset($_GET["total_lugares"])  && isset($_GET["status"]) && isset($_GET["pessoas_carro"]) && isset($_GET["observacao"])){
			//preencher os atributos com os valores do formulario
			$this->Nome = $_GET["nome"];
			$this->Horario_saida = $_GET["horario_saida"];
			$this->Horario_retorno = $_GET["horario_retorno"];
			$this->Qtdpessoa = $_GET["qtdpessoa"];
			$this->Local_saida = $_GET["local_saida"];
			$this->title = $_GET["Title"];
			$this->Motorista = $_GET["motorista"];
			$this->Motorista2 = $_GET["motorista2"];
			$this->start = $_GET["Start"];
			$this->Total_lugares = $_GET["total_lugares"];
			$this->Status = $_GET["status"];
			$this->Pessoas_carro = $_GET["pessoas_carro"];
			$this->Observacao = $_GET["observacao"];


			//criar o comando sql
			$smtp = $pdo->prepare("insert into usuario(Id,nome,pessoas_carro,horario_saida,horario_retorno,qtdpessoa,local_saida,Title,motorista,motorista2,Start,total_lugares,data_marcada,status, observacao) values(null,:nome,:pessoas_carro,:horario_saida,:horario_retorno,:qtdpessoa,:local_saida,:Title,:motorista,:motorista2,:Start,:total_lugares,now(),:status,:observacao)");

			//executar o comando no banco de dados passando os valores por parametros
			$res = $smtp->execute(array (
				':nome' => $this->Nome,
				':pessoas_carro' => $this->Pessoas_carro,
				':horario_saida' => $this->Horario_saida,
				':horario_retorno' => $this->Horario_retorno,
				':qtdpessoa' => $this->Qtdpessoa,
				':local_saida' => $this->Local_saida,
				':Title' => $this->title,
				':motorista' => $this->Motorista,
				':motorista2' => $this->Motorista2,
				':Start' => $this->start,
				':total_lugares' => $this->Total_lugares,
				':status' => $this->Status,
				':observacao' => $this->Observacao
			));
			
			//verificar se retornou dados
			if ($smtp->rowCount() > 0) {
				//volta index
				header("location:indexADMIN.php");
			}
		}else{
			header("location:indexADMIN.php");
		}
	}





		

	//metodo excluir
	public function excluir($Id){
		//verificar se recebeu o codigo para excluir
		if(isset($Id)) {
			//preencher o atrivuto codigo com o valor recebido
			$this->id = $Id;
			//criar a conexao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("delete from usuario where Id = :Id");
			//executar o comando no banco de dados passando os valores por parametros
			$smtp->execute(array(
				':Id' => $this->id
			));
			//verificar se o comando funcionou
			if($smtp->rowCount() > 0){
				//retornar para index.php
				header('location:indexADMIN.php');
			}
		}else{//se o usuario nao selecionou 
			header('location:indexADMIN.php');
		}
	}
	//metodo para alterar cargos
	public function alterar(){
		//verificar se o usuario preencheu os dados no formulario
		if (isset($_POST["salvar"])) {
			$this->id = $_GET["Id"];
			$this->NOME = $_POST["pessoas_carro"];
			$this->HORARIO_SAIDA = $_POST["horario_saida"];
			$this->HORARIO_RETORNO = $_POST["horario_retorno"];
			$this->QTDPESSOA = $_POST["qtdpessoa"];
			$this->LOCAL_SAIDA = $_POST["local_saida"];
			$this->TITLE = $_POST["Title"];
			$this->MOTORISTA = $_POST["motorista"];
			$this->MOTORISTA2 = $_POST["motorista2"];
			$this->START = $_POST["Start"];
			$this->TOTAL_LUGARES = $_POST["total_lugares"];
			$this->STATUS = $_POST["status"];
			$this->OBSERVACAO = $_POST["observacao"];
		//criar a coenxao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("update usuario set pessoas_carro = :pessoas_carro, horario_saida = :horario_saida, horario_retorno = :horario_retorno, qtdpessoa = :qtdpessoa, local_saida = :local_saida, Title = :Title, motorista = :motorista, motorista2 = :motorista2, Start = :Start, total_lugares = :total_lugares, status = :status, observacao = :observacao where Id = :Id");

			//executar no banco passando os valores recebidos como parametros
			$smtp->execute(array(
				':Id' => $this->id,
				':pessoas_carro' => $this->NOME,
				':horario_saida' => $this->HORARIO_SAIDA,
				':horario_retorno' => $this->HORARIO_RETORNO,
				':qtdpessoa' => $this->QTDPESSOA,
				':local_saida' => $this->LOCAL_SAIDA,
				':Title' => $this->TITLE,
				':motorista' => $this->MOTORISTA,
				':motorista2' => $this->MOTORISTA2,
				':Start' => $this->START,
				':total_lugares' => $this->TOTAL_LUGARES,
				':status' => $this->STATUS,
				':observacao' => $this->OBSERVACAO
			));

			//verificar se retornou dados
			if ($smtp->rowCount() > 0) {
				//volta index
				header("location:indexADMIN.php");
			}
		}else{
			header("location:./");
		}
	}

	//funcao para listar os dados do banco
	public function listarCodigo($Id){
		//verificar se recebou o codigo como parametro
		if(isset($Id)) {
			//preenche os atributos com valores do form
			$this->ID = $Id;
			//criar a conexao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("select * from usuario where Id = :Id");
			//executar no banco passando o codigo como parametro
			$smtp->execute(array(
				':Id' => $this->ID
			));
			//verificar se retornou dados
			if($smtp->rowCount() > 0){
				return $result = $smtp->fetchObject();
			}
		}
	}








	public function entrar(){
		//verificar se o usuario preencheu os dados no formulario
		if (isset($_POST["salvar"])) {
			$this->id = $_GET["Id"];
			$this->NOME = $_POST["pessoas_carro"];
			$this->HORARIO_SAIDA = $_POST["horario_saida"];
			$this->HORARIO_RETORNO = $_POST["horario_retorno"];
			$this->QTDPESSOA = $_POST["qtdpessoa"];
			$this->LOCAL_SAIDA = $_POST["local_saida"];
			$this->TITLE = $_POST["Title"];
			$this->MOTORISTA = $_POST["motorista"];
			$this->START = $_POST["Start"];
		//criar a coenxao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("update usuario set pessoas_carro = :pessoas_carro, horario_saida = :horario_saida, horario_retorno = :horario_retorno, qtdpessoa = :qtdpessoa + 1, local_saida = :local_saida, Title = :Title, motorista = :motorista, Start = :Start where Id = :Id");

			//executar no banco passando os valores recebidos como parametros
			$smtp->execute(array(
				':Id' => $this->id,
				':pessoas_carro' => $this->NOME,
				':horario_saida' => $this->HORARIO_SAIDA,
				':horario_retorno' => $this->HORARIO_RETORNO,
				':qtdpessoa' => $this->QTDPESSOA,
				':local_saida' => $this->LOCAL_SAIDA,
				':Title' => $this->TITLE,
				':motorista' => $this->MOTORISTA,
				':Start' => $this->START
			));

			//verificar se retornou dados
			if ($smtp->rowCount() > 0) {
				//volta index
				header("location:indexL.php");
			}
		}else{
			header("location:./");
		}
	}




}


//criar classe Cargos
class Usuarios3{
	//criar atributos/campos da tabela
	public $id;
	public $data;
	public $nome;
	public $mensagem;

//metodo excluir
	public function excluirr($Id){
		//verificar se recebeu o codigo para excluir
		if(isset($Id)) {
			//preencher o atrivuto codigo com o valor recebido
			$this->id = $Id;
			//criar a conexao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("delete from post where Id = :Id");
			//executar o comando no banco de dados passando os valores por parametros
			$smtp->execute(array(
				':Id' => $this->id
			));
			//verificar se o comando funcionou
			if($smtp->rowCount() > 0){
				//retornar para index.php
				header('location:blogADMIN.php');
			}
		}else{//se o usuario nao selecionou 
			header('location:blogADMIN.php');
		}
	}


	}





//criar classe Cargos
class Motorista{
	//criar atributos/campos da tabela
	public $id;
	public $nome_motorista;


public function inserir(){
		//criar a conexao com o banco de dados
		$pdo = new PDO(server, usuario, senha);
		//verificar se o usuario preencheu os dados no formulario
		if(isset($_GET["nome_Motorista"])){
			//preencher os atributos com os valores do formulario
			$this->nome_motorista = $_GET["nome_Motorista"];


			//criar o comando sql
			$smtp = $pdo->prepare("insert into motorista(Id,nome_Motorista) values(null,:nome_Motorista)");

			//executar o comando no banco de dados passando os valores por parametros
			$res = $smtp->execute(array (
				':nome_Motorista' => $this->nome_motorista
				
			));
//verificar se retornou dados
			if ($smtp->rowCount() > 0) {
				//volta index
				header("location:cadastrarmotorista.php");
			}
		}else{
			header("location:./");
		}	
	}


		//metodo para selecionar todos os cargos
	public function listarTodos(){
		//criar a conexao com o bd
		$pdo = new PDO(server,usuario,senha);
		//comando sql
		$smtp = $pdo->prepare("select * from motorista");
		//executar comando
		$smtp->execute();
		//verificar se retornou valores
		if($smtp->rowCount() > 0){
			return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
		}
	}

		//metodo excluir
	public function excluir($Id){
		//verificar se recebeu o codigo para excluir
		if(isset($Id)) {
			//preencher o atrivuto codigo com o valor recebido
			$this->id = $Id;
			//criar a conexao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("delete from motorista where Id = :Id");
			//executar o comando no banco de dados passando os valores por parametros
			$smtp->execute(array(
				':Id' => $this->id
			));
			//verificar se o comando funcionou
			if($smtp->rowCount() > 0){
				//retornar para index.php
				header('location:cadastrarmotorista.php');
			}
		}else{//se o usuario nao selecionou 
			header('location:cadastrarmotorista.php');
		}
	}

			//metodo para alterar cargos
	public function alterar(){
		//verificar se o usuario preencheu os dados no formulario
		if (isset($_POST["salvar"])) {
			$this->id = $_GET["Id"];
			$this->NOME_MOTORISTA = $_POST["nome_Motorista"];

		//criar a coenxao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("update motorista set nome_Motorista = :nome_Motorista where Id = :Id");

			//executar no banco passando os valores recebidos como parametros
			$smtp->execute(array(
				':Id' => $this->id,
				':nome_Motorista' => $this->NOME_MOTORISTA
			));

			//verificar se retornou dados
			if ($smtp->rowCount() > 0) {
				//volta index
				header("location:cadastrarmotorista.php");
			}
		}else{
			header("location:./");
		}
	}
	//funcao para listar os dados do banco
	public function listarCodigo($Id){
		//verificar se recebou o codigo como parametro
		if(isset($Id)) {
			//preenche os atributos com valores do form
			$this->ID = $Id;
			//criar a conexao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("select * from motorista where Id = :Id");
			//executar no banco passando o codigo como parametro
			$smtp->execute(array(
				':Id' => $this->ID
			));
			//verificar se retornou dados
			if($smtp->rowCount() > 0){
				return $result = $smtp->fetchObject();
			}
		}
	}

	}









	class Motivos{
	//criar atributos/campos da tabela
	public $Id;
	public $Marcou;
	public $Nome;
	public $Motivo;
	public $Horario;
	public $Id_transporte;


	public function inserir(){

		//criar a conexao com o banco de dados
		$pdo = new PDO(server, usuario, senha);
		//verificar se o usuario preencheu os dados no formulario
		if(isset($_GET["marcou"]) && isset($_GET["nome"]) && isset($_GET["motivo"]) && isset($_GET["id_transporte"]) ){
			//preencher os atributos com os valores do formulario
			$this->Marcou = $_GET["marcou"];
			$this->Nome = $_GET["nome"];
			$this->Motivo = $_GET["motivo"];
			$this->Id_transporte = $_GET["id_transporte"];
	


			//criar o comando sql
			$smtp = $pdo->prepare("insert into saida(id,marcou,nome,motivo,horario,id_transporte) values(null,:marcou,:nome,:motivo,now(),:id_transporte)");

			//executar o comando no banco de dados passando os valores por parametros
			$res = $smtp->execute(array (
				':marcou' => $this->Marcou,
				':nome' => $this->Nome,
				':motivo' => $this->Motivo,
				':id_transporte' => $this->Id_transporte
			));
//verificar se retornou dados
			if ($smtp->rowCount() > 0) {
				//volta index
	
				header("location:indexL.php");
				

			}
		}else{
			header("location:indexL.php");
		}


require 'PHPMailer/PHPMailerAutoload.php';


	$Mailer = new PHPMailer();
	
	//Define que serásado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configuraçs
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'smtp.gmail.com';
	//Porta de saida de e-mail 
	$Mailer->Port = 465;
	
	//Dados do e-mail de saida - autenticaç
	$Mailer->Username = 'transporte.educnl@gmail.com';
	$Mailer->Password = '';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticaç)
	$Mailer->From = 'transporte.educnl@gmail.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Transporte SEMED';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Pedido de saida de Transporte!';
	
	//Corpo da Mensagem
	$Mailer->Body = 'Detalhes:' . '<br>' .'Nome: ' . $_GET["nome"]  . '<br>' . 'Motivo: ' . $_GET["motivo"] . '<br>' . 'Marcado por: ' . $_GET["marcou"];
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'Fim...';
	
	//Destinatario 
	$Mailer->AddAddress('transporte.educnl@gmail.com');
	
	if($Mailer->Send()){
		echo "Saida requisitada com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
	
		
	
	}

	//metodo para selecionar todos os cargos
	public function listarTodos(){
		//criar a conexao com o bd
		$pdo = new PDO(server,usuario,senha);
		//comando sql
		$smtp = $pdo->prepare("select * from saida order by Horario DESC limit 5");
		//executar comando
		$smtp->execute();
		//verificar se retornou valores
		if($smtp->rowCount() > 0){
			return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
		}
	}

		//metodo excluir
	public function excluir($id){
		//verificar se recebeu o codigo para excluir
		if(isset($id)) {
			//preencher o atrivuto codigo com o valor recebido
			$this->Id = $id;
			//criar a conexao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("delete from saida where id = :id");
			//executar o comando no banco de dados passando os valores por parametros
			$smtp->execute(array(
				':id' => $this->Id
			));
			//verificar se o comando funcionou
			if($smtp->rowCount() > 0){
				//retornar para index.php
				header('location:indexADMIN.php');
			}
		}else{//se o usuario nao selecionou 
			header('location:indexADMIN.php');
		}
	}
}





	



