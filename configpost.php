<?php
//definir constantes para conexao com o banco
include 'conexoes/conexao2.php';

//criar classe Cargos
class postagem{
	//criar atributos/campos da tabela
	public $Id;
	public $postagem;
	public $Mensagem;


	//metodos
	//metodo para selecionar todos os cargos
	public function listarTodos(){
		//criar a conexao com o bd
		$pdo = new PDO(server,usuario,senha);
		//comando sql
		$smtp = $pdo->prepare("select * from post");
		//executar comando
		$smtp->execute();
		//verificar se retornou valores
		if($smtp->rowCount() > 0){
			return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
		}
	}



		public function excluirmensagem($id){
		//verificar se recebeu o codigo para excluir
		if(isset($id)) {
			//preencher o atrivuto codigo com o valor recebido
			$this->Id = $id;
			//criar a conexao com o banco de dados
			$pdo = new PDO(server, usuario, senha);
			//criar o comando sql
			$smtp = $pdo->prepare("delete from post where id = :id");
			//executar o comando no banco de dados passando os valores por parametros
			$smtp->execute(array(
				':id' => $this->Id
			));
			//verificar se o comando funcionou
			if($smtp->rowCount() > 0){
				//retornar para index.php
				header('location:blogADMIN.php');
			}
		}else{//se o usuario nao selecionou 
			header('location:index.php');
		}
	}







}