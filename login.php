<?php
require_once 'classe_triagem.php';
$p = new enfermagem("tcc","localhost","root","");
session_start();
?>
<!DOCTYPE html>
<html lang=”pt-br”>
<html>
<h1> Login  </h1>

    <head> 
        <title>  Tela de login </title>
        <meta charset= "utf-8" >
        <link rel= "stylesheet" href="css.css" type="text/css">
        <!-- LINK PARA PHP\JS <link rel="stylesheet" type="text/css" media="screen" href="main.css"> -->
        <!-- Adicionando Javascript --></head>

        <header>
            <!-- ADD CODIGO DO CABEÇALHO -->
        </header>
        <body>
            <?php
    if(isset($_POST['rg']))
    {
        $rg = addslashes($_POST['rg']);
        $senha = addslashes($_POST['senha']);

        if(!empty($rg) && !empty($senha) )
        {
            if(!$p -> login($rg,$senha))
            {   
               header("Location: home.php");
            }
            
        }
        else
        {
            echo "Preencha todos os campos";
        }



    }?>
               
    <table>
        <tr>
        <td><a href="home.php"> Início </a></td>
        <td><a href="agendamento.html"> Agendamentos </a></td>
        <td><a href="prontuario.html"> Prontuário </a></td>
        <td><a href="exames.html>"> Exames </a> </td>
        <td><a href="ajuda.html"> Ajuda </a></td>
        </tr>
    </table>
    
       <form method="POST">
             <h3> Logue-se </h3>

            <br><label for="rg"> RG: </label>
            <input type="text" name="rg"  id="rg" placeholder="XX.XXX.XXX-X" >
            
            <br><div id="senha" value="senha" name="senha"> Senha: <br/>
            <input type="password" name="senha"></div><br/>  


                <button type="submit" > Logar </button>


</form>

    <footer>
        <!-- ADD CODIGO DO RODAPE -->
    </footer>
</body>
</html>        
