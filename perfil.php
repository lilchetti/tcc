<!--Está é a pagina que o adiministrador vai fazer o cadastro de funcionarios-->
<?php
session_start();
require_once 'classe_triagem.php';
$p = new enfermagem("tcc","localhost","root","");
?>
<!DOCTYPE html>
<html lang=”pt-br”>
<html>

    <head> 
        <title> meu perfil </title>
        <meta charset= "utf-8" >
        <link rel= "stylesheet" href="css.css" type="text/css"> 
        <!-- LINK PARA PHP\JS <link rel="stylesheet" type="text/css" media="screen" href="main.css"> -->
        <!-- Adicionando Javascript --></head>
        <header>   <!-- ADD CODIGO DO CABEÇALHO --> </header>

        <body>

    <table>
        <tr>
        <td><a href="agendamento.html"> Agendamentos </a></td>
        <td><a href="prontuario.html"> Prontuário </a></td>
        <td><a href="exames.html>"> Exames </a> </td>

        </tr>
    </table>
            <section id="direita">
      <h2>    <?php echo "Bem vindo (a) " . $_SESSION['nome'] ?> </h2>

    <div class="circle">
      <img src="upload/<?php echo $_SESSION['rg']; ?>.jpg" width=200 height=200 style ="border-radius: 70%;">
      <img>
    </div> 

              <table>
                <tr> 
                  <td> Exame de Sangue </td>
                  <td> Exame de urina </td>
                  <td> Exame de fezes </td>
                  <td> Exame Pelvico  </td>
                  <td> Exame Transvaginal </td>
                  <td> Abdominal </td>
                  <td> Tireoide </td>
                  <td> Mamas </td>
                  <td> Ecocardiograma </td>
                  <td> Joelho </td>
                  <td> Bacia </td>
                  <td> Renal </td>
                  <td> Coluna </td>
                  <td> Funcional </td>
                  <td> Angiografia </td>
                  <td> Cardiaca </td>
                  <td> Outros </td>
                </tr>
              <?php
                $dados = $p->buscarDados2();
                if(count($dados) > 0) #se tem cadastro no banco
                {
                 
                  for ($i=0; $i < count($dados); $i++) 
                  {
                    echo "<tr>";
                    foreach ($dados[$i] as $k => $v) 
                    {
                      if($k != "id")
                      {
                        echo "<td>".$v."</td>";
                      }
                    }?>

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
  <?php

  include("conexao2.php");

  $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = time() . $extensao; //define o nome do arquivo
    $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

    $sql_code = "INSERT INTO perfil (rg,codigo, img, data) VALUES('$_SESSION[rg]',$_SESSION[rg], '$novo_nome', NOW())";

    if($conn->query($sql_code))
      $msg = "Arquivo enviado com sucesso!";
    else
      $msg = "Falha ao enviar arquivo.";

  }

?>
      <h4>Adicione uma foto para o seu perfil</h4>
      <?php if(isset($msg) && $msg != false) echo "<p> $msg </p>"; ?>
      <form action="perfil.php" method="POST" enctype="multipart/form-data">
        Arquivo: <input type="file" required name="arquivo">

        <input type="submit" value="Salvar">


</form>

   </body>
   <footer>
      <!-- ADD CODIGO DO RODAPE -->
   </footer>
</html>
