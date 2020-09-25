<?php



class enfermagem{ 
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
	public function login($rg,$senha)
	{
		$cmd =$this->PDO->prepare("SELECT Id,nome,rg,nascimento,sexo FROM usuario WHERE rg = :rg AND senha = :senha");

			$cmd->bindValue(":rg",$rg);
			$cmd->bindValue(":senha",$senha);
			$cmd->execute();

			if($cmd->rowCount() > 0)
			{
				$dado = $cmd->fetch();
				$_SESSION['Id'] = $dado['Id']; #id do usuario logado
				$_SESSION['nome'] = $dado['nome']; #nome do usuario logado
				$_SESSION['rg'] = $dado['rg'];
				$_SESSION['nascimento'] = $dado['nascimento']; #idade do usuario logado
				$_SESSION['sexo'] = $dado['sexo']; #sexo do usuario logado
				header("Location: perfil.php");
				return true;
			}
			
			else
			{
				return false; #nn foi possivel logar
			}
	}

	public function triagem($rg,$dataTriagem,$peso,$altura,$imc,$TSanguineo){

			$cmd = $this->PDO->prepare("INSERT INTO triagem (rg,dataTriagem,peso,altura,imc,TSanguineo) VALUES (:rg,:dataTriagem,:peso,:altura,:imc,:TSanguineo)");

			$cmd->bindValue(":rg",$rg);
			$cmd->bindValue(":dataTriagem",$dataTriagem);
			$cmd->bindValue(":peso",$peso);
			$cmd->bindValue(":altura",$altura);
			$cmd->bindParam(":imc", $imc);
			$cmd->bindValue(":TSanguineo",$TSanguineo);
			$cmd->execute();
			return true;


}

	public function dados($Id) # NÃO FUNCIONAL 
	{	
		$Id = $_SESSION['Id'];
		
		$cmd =$this->PDO->prepare("SELECT imc,doenca,medicacao FROM triagem WHERE Id = :$Id");

			$cmd->bindParam(":$Id",$Id);
			$cmd->execute();

			if($cmd->rowCount() > 0)
			{
				$dado = $cmd->fetch();
				session_start();
				$_SESSION['imc'] = $dado['imc']; #id do usuario logado
				$_SESSION['doenca'] = $dado['doenca']; #nome do usuario logado
				$_SESSION['medicacao'] = $dado['medicacao'];
				header("medico.php");
				return true;
			}
			
			else
			{
				return false; #nn foi possivel logar
			}
	}
	public function exames($rg,$Esangue,$urina,$fezes,$pelvico,$transvaginal,$abdominal,$tireoide,$mamas,$ecocardiograma,$joelho,$bacia,$renal,$coluna,$funcional,$angiografia,$cardiaca,$outros){

			$cmd = $this->PDO->prepare("INSERT INTO exames (rg,sangue,urina,fezes,pelvico,transvaginal,abdominal,tireoide,mamas,ecocardiograma,joelho,bacia,renal,coluna,funcional,angiografia,cardiaca,outros) VALUES (:rg,:s,:u,:f,:pel,:tra,:abd,:tir,:mam,:eco,:joe,:bac,:ren,:col,:fun,:ang,:car,:o)");

			$cmd->bindValue(":rg",$rg);
			$cmd->bindValue(":s",$Esangue);
			$cmd->bindValue(":u",$urina);
			$cmd->bindValue(":f",$fezes);
			$cmd->bindValue(":pel",$pelvico);
			$cmd->bindValue(":tra",$transvaginal);
			$cmd->bindValue(":abd",$abdominal);
			$cmd->bindValue(":tir",$tireoide);
			$cmd->bindValue(":mam",$mamas);
			$cmd->bindValue(":eco",$ecocardiograma);
			$cmd->bindValue(":joe",$joelho);
			$cmd->bindValue(":bac",$bacia);
			$cmd->bindValue(":ren",$renal);
			$cmd->bindValue(":col",$coluna);
			$cmd->bindValue(":fun",$funcional);
			$cmd->bindValue(":ang",$angiografia);
			$cmd->bindValue(":car",$cardiaca);
			$cmd->bindValue(":o",$outros);
			$cmd->execute();
			return true;


}

	public function buscarDados2()
	{
	
		$res = array();
		$cmd = $this->PDO->query("SELECT sangue,urina,fezes,pelvico,transvaginal,abdominal,tireoide,mamas,ecocardiograma,joelho,bacia,renal,coluna,funcional,angiografia,cardiaca,outros FROM exames WHERE rg = '$_SESSION[rg]'");
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		Return $res; 

	}
		

}?>