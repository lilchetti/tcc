<!-- Esta pagina esta ligada a pagina 
	adm.php e faz a conexao com a pagina conexao.php, busca os dados,deleta e cadastra-->
<?php
class usuarios{ 
	private $pdo;
	//conexão com o banco
	public function __construct($dbname,$host,$user,$senha)
	{
		try{
			$this->PDO = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
		}
	
	catch(PDOException $e){
	echo "Ero com banco de dados: ".$e->getMessage();
	exit();
}
	catch(Exception $e){
	echo "Ero com banco de dados: ".$e->getMessage();
	exit();
}	
	}
	public function cadastrarPessoas($nome,$cpf,$rg,$nasc,$sexo,$email,$senha)
	{
		#verificar se o email já está cadastrado
		$cmd = $this->PDO->prepare("SELECT id FROM usuario WHERE email = :e");
		$cmd->bindValue(":e",$email);
		$cmd->execute();
		if($cmd->rowCount() > 0)#email já existe no banco
		{
			return false;
		}
		else #email não existe	
		{
			$cmd = $this->PDO->prepare("INSERT INTO usuario (nome,cpf,rg,nascimento,sexo,email,senha) VALUES (:nome,:cpf,:rg,:nasc,:sexo,:email,:senha)");

			$cmd->bindValue(":nome",$nome);
			$cmd->bindValue(":cpf",$cpf);
			$cmd->bindValue(":rg",$rg);
			$cmd->bindValue(":nasc",$nasc);
			$cmd->bindValue(":sexo",$sexo);
			$cmd->bindValue(":email",$email);
			$cmd->bindValue(":senha",$senha);
			$cmd->execute();
			return true;
		}
	}

	public function endereco($telefone,$cep,$endereco,$bairro,$cidade,$estado,$numero){

			$cmd = $this->PDO->prepare("INSERT INTO endereco (telefone,cep,endereco,bairro,cidade,estado,numero) VALUES (:telefone,:cep,:endereco,:bairro,:cidade,:estado,:numero)");

			$cmd->bindValue(":telefone",$telefone);
			$cmd->bindValue(":cep",$cep);
			$cmd->bindValue(":endereco",$endereco);
			$cmd->bindValue(":bairro",$bairro);
			$cmd->bindValue(":cidade",$cidade);
			$cmd->bindValue(":estado",$estado);
			$cmd->bindValue(":numero",$numero);
			$cmd->execute();
			return true;

}

}
?>