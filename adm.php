<!--Está é a pagina que o adiministrador vai fazer o cadastro de funcionarios-->
<?php
require_once 'classe_funcionario.php';
$p = new funcionarios("tcc","localhost","root","");
?>
<!DOCTYPE HTML>
<html lang=”pt-br”>

<html>
<h1> Cadastro de funcionarios  </h1>

    <head> 
        <title>  Administração </title>
        <meta charset=”UTF-8”>
        <link rel= "stylesheet" href="css.css" type="text/css"> 
        <!-- LINK PARA PHP\JS <link rel="stylesheet" type="text/css" media="screen" href="main.css"> -->
    </head>


  <body>
    <?php
    if(isset($_POST['nome']))
    {
    	$nome = addslashes($_POST['nome']);
    	$contratacao = addslashes($_POST['contratacao']);
    	$nasc = addslashes($_POST['nasc']);
    	$cargo = addslashes($_POST['cargo']);
    	$salario = addslashes($_POST['salario']);
    	$cpf = addslashes($_POST['cpf']);
    	$rg = addslashes($_POST['rg']);
    	$tel = addslashes($_POST['tel']);
    	$email = addslashes($_POST['email']);
    	$senha = addslashes($_POST['senha']);

    	if(!empty($nome) && !empty($contratacao) && !empty($nasc) && !empty($cargo) && !empty($salario) && !empty($cpf) && !empty($rg) && !empty($tel) && !empty($email) && !empty($senha))
    	{
    		if(!$p->cadastrarPessoas($nome,$contratacao,$nasc,$cargo,$salario,$cpf,$rg,$tel,$email,$senha))
    		{
    			echo "Usuario já cadastrado";
    		}
    		
    	}
    	else
    	{
    		echo "Preencha todos os campos";
    	}


    }


    ?>
 
        <h1> Cadastro de funcionarios </h1> 
           
    
       <form method="POST">

       	<section id="esquerda">
            <br><label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome"placeholder="Ex: Gustavo dos Santos" >

            <br><label for="contratacao">Data de contratacao: </label>
            <input type="text" name="contratacao" id="contratacao"placeholder="00/00/0000" >

            <br><label for="nasc"> Data de nascimento: </label>
            <input type="text" name="nasc" id="nasc"placeholder="00/00/0000" >

            <br><label for="cargo"> Cargo: </label>
            <select name="cargo"id="cargo">
			  <option value="medico"> Médico(a) </option> 
			  <option value="secretario"> Secretario(a) </option>
			  <option value="tecEnfermagem">Técnico(a) em enfermagem</option>
			  <option value="farmaceutico"> Farmacêutico(a) </option>
			  <option value="administração">Administração </option>
			</select>

  			<br><label for="salario"> Salário: </label>
            <input type="text" name="salario" id="salario">

            <br><label for="cpf"> CPF: </label>
            <input type="text" name="cpf" id="cpf"placeholder="Ex: XXX.XXX.XXX-XX" >

           <br> <label for="rg"> RG: </label>
            <input type="text" name="rg" id="rg"placeholder="Ex: YY.YYY.YYY-Y" >

           <br> <label for="tel"> Telefone: </label>
            <input type="text" name="tel" id="tel" placeholder="Ex: (11)90000-0000" >

           <br> <label for="email"> Email </label>
            <input type="email" name="email" id="email" placeholder="Ex: kiyote1342@gmail.com" >

            <br><label for="senha"> senha: </label>
            <input type="password" name="senha" id="senha">

                
                <button type="submit" value="cadastrar"> Cadastrar </button>

            </section>

            <section id="direita">
            	<table>
            		<tr> 
            			<td>Nome </td>
            			<td>Data de contratação </td>
            			<td>Salário </td>
            			<td>Cargo </td>
            			<td>CPF </td>
            			<td>RG </td>
            			<td>Telefone </td>
            			<td>Email </td>
            			<td colspan="2">Senha </td>
            		</tr>
            	<?php
            		$dados = $p->buscarDados();
            		if(count($dados) > 0) #se tem cadastro no banco
            		{
            			for ($i=0; $i < count($dados); $i++) 
            			{
            				echo "<tr>";
            				foreach ($dados[$i] as $k => $v) 
            				{
            					if($k != "id_fun")
            					{
            						echo "<td>".$v."</td>";
            					}
            				}?>
            				
            			
            			<td><a href="home.html"> Editar </a> <a href="adm.php?id=<?php echo $dados[$i]['id_fun'];?>"> Excluir </a></td>
            			<?php  
            			echo "</tr>";
            			}
            		}
            		else # se o banco esta vazio
            		{
            			echo "O banco esta vazio";
            		}

            	?>
            	
            		<tr>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            		</tr>
            	</table>
            </section>
    
</p>

</form>
</body>
</html>
<?php
		if(isset($_GET['id_fun']))
		{
				$id_func = addslashes($_GET['id_fun']);
				$p->excluir($id_func);
				header("location:adm.php");
		}

?>