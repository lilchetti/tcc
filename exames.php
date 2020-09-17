<?php
require_once 'classe_triagem.php';
$p = new enfermagem("tcc","localhost","root","");
session_start();
?>
<!DOCTYPE html>
<html lang=”pt-br”>
<html>
<h1> Cadastro usuario </h1>

    <head> 
        <title>  Pedidos de Exame </title>
        <meta charset= "utf-8" >
        <link rel= "stylesheet" href="css.css" type="text/css"> 
        <!-- LINK PARA PHP\JS <link rel="stylesheet" type="text/css" media="screen" href="main.css"> -->
        <!-- Adicionando Javascript --></head>
        <body>

          
     <h1> Cadastro </h1> 


               
    <table>
        <tr>
        <td><a href="home.html"> Início </a></td>
        <td><a href="agendamento.html"> Agendamentos </a></td>
        <td><a href="prontuario.html"> Prontuário </a></td>
        <td><a href="exames.html>"> Exames </a> </td>
        <td><a href="ajuda.html"> Ajuda </a></td>
        </tr>
    </table>
    
<?php
      $Esangue = (bool) rand(0, 1) ? "checked" : null;
      $urina  = (bool) rand(0, 1) ? "checked" : null;
      $fezes  = (bool) rand(0, 1) ? "checked" : null;

      $pelvico = (bool) rand(0, 1) ? "checked" : null;
      $transvaginal  = (bool) rand(0, 1) ? "checked" : null;
      $abdominal  = (bool) rand(0, 1) ? "checked" : null;
      $tireoide = (bool) rand(0, 1) ? "checked" : null;
      $mamas  = (bool) rand(0, 1) ? "checked" : null;
      $ecocardiograma  = (bool) rand(0, 1) ? "checked" : null;

      $joelho = (bool) rand(0, 1) ? "checked" : null;
      $bacia  = (bool) rand(0, 1) ? "checked" : null;
      $renal  = (bool) rand(0, 1) ? "checked" : null;
      $coluna = (bool) rand(0, 1) ? "checked" : null;

      $funcional  = (bool) rand(0, 1) ? "checked" : null;
      $angiografia  = (bool) rand(0, 1) ? "checked" : null;
      $cardiaca = (bool) rand(0, 1) ? "checked" : null;
      $Rmamas  = (bool) rand(0, 1) ? "checked" : null;


      $_POST['Esangue'] = ( isset($_POST['Esangue']) ) ? true : null;
      $_POST['urina']  = ( isset($_POST['urina']) )  ? true : null;
      $_POST['fezes']  = ( isset($_POST['fezes']) )  ? true : null;

      $_POST['pelvico'] = ( isset($_POST['pelvico']) ) ? true : null;
      $_POST['transvaginal']  = ( isset($_POST['transvaginal']) )  ? true : null;
      $_POST['abdominal']  = ( isset($_POST['abdominal']) )  ? true : null;
      $_POST['tireoide'] = ( isset($_POST['tireoide']) ) ? true : null;
      $_POST['mamas']  = ( isset($_POST['mamas']) )  ? true : null;
      $_POST['ecocardiograma']  = ( isset($_POST['ecocardiograma']) )  ? true : null;

      $_POST['joelho'] = ( isset($_POST['joelho']) ) ? true : null;
      $_POST['bacia']  = ( isset($_POST['bacia']) )  ? true : null;
      $_POST['renal']  = ( isset($_POST['renal']) )  ? true : null;
      $_POST['coluna'] = ( isset($_POST['coluna']) ) ? true : null;

      $_POST['funcional']  = ( isset($_POST['funcional']) )  ? true : null;
      $_POST['angiografia']  = ( isset($_POST['angiografia']) )  ? true : null;
      $_POST['cardiaca'] = ( isset($_POST['cardiaca']) ) ? true : null;
      $_POST['Rmamas']  = ( isset($_POST['Rmamas']) )  ? true : null;

        $rg = $_SESSION['rg'];
        $Esangue = addslashes($_POST['Esangue']);
        $urina = addslashes($_POST['urina']);
        $fezes = addslashes($_POST['fezes']);

        $pelvico = addslashes($_POST['pelvico']);
        $transvaginal = addslashes($_POST['transvaginal']);
        $abdominal = addslashes($_POST['abdominal']);
        $tireoide = addslashes($_POST['tireoide']);
        $mamas = addslashes($_POST['mamas']);
        $ecocardiograma = addslashes($_POST['ecocardiograma']);

        $joelho = addslashes($_POST['joelho']);
        $bacia = addslashes($_POST['bacia']);
        $renal = addslashes($_POST['renal']);
        $coluna = addslashes($_POST['coluna']);

        $funcional = addslashes($_POST['funcional']);
        $angiografia = addslashes($_POST['angiografia']);
        $cardiaca = addslashes($_POST['cardiaca']);
        $outros = addslashes($_POST['outros']);
  

            if(!$p->exames($rg,$Esangue,$urina,$fezes,$pelvico,$transvaginal,$abdominal,$tireoide,$mamas,$ecocardiograma,$joelho,$bacia,$renal,$coluna,$funcional,$angiografia,$cardiaca,$outros))
            {
                echo "Erro!";
            }

                

    ?>

    
       <form method="POST"enctype="multipart/form-data">

</section>
        <section id="direita">
              <legend> Selecione os exames que deseja realizar: </legend>
          <div>
            <input type = "checkbox" name = "Esangue" value = "rotina">
            <label for = "Esangue">  exame de sangue </label>
          </div>
          <div>
            <input type = "checkbox" name = "urina" value = "rotina">
            <label for = "urina"> urina </ label>
          </div>
          <div>
            <input type = "checkbox" name = "fezes" value = "rotina">
            <label for = "fezes"> fezes </label>
          </div>

       <input type="submit" name="insert" value="submit">

</fieldset>
        <fieldset>
          <legend> Ultrassom: </legend>
          <div>
            <input type = "checkbox" name = "pelvico" value = "rotina">
            <label for = "pelvico">  ultrassom pélvico </label>
          </div>
          <div>
            <input type = "checkbox" name = "transvaginal" value = "rotina">
            <label for = "transvaginal"> ultrassom transvaginal </ label>
          </div>
          <div>
            <input type = "checkbox" name = "abdominal" value = "rotina">
            <label for = "abdominal"> ultrassom do abdominal superior </label>
          </div>
          <div>
            <input type = "checkbox" name = "tireoide" value = "rotina">
            <label for = "tireoide">  ultrassom da tireoide </label>
          </div>
          <div>
            <input type = "checkbox" name = "mamas" value = "rotina">
            <label for = "mamas"> ultrassom das mamas </label>
          </div>
          <div>
            <input type = "checkbox" name = "ecocardiograma" value = "rotina">
            <label for = "ecocardiograma">  Ecocardiograma </label>
          </div>

        </fieldset>

           <fieldset>
          <legend> Raio X: </legend>
          <div>
            <input type = "checkbox" name = "torax" value = "rotina">
            <label for = "torax">  Radiografia do Tórax </label>
          </div>
          <div>
            <input type = "checkbox" name = "abdomem" value = "rotina">
            <label for = "abdomem"> Raio x do Abdomem </ label>
          </div>
          <div>
            <input type = "checkbox" name = "coluna" value = "rotina">
            <label for = "coluna"> Raio x da Coluna </label>
          </div>
          <div>
            <input type = "checkbox" name = "joelho" value = "rotina">
            <label for = "joelho">  Raio x do Joelho </label>
          </div>
          <div>
            <input type = "checkbox" name = "bacia" value = "rotina">
            <label for = "bacia"> Raio x da Bacia </label>
          </div>
          <div>
            <input type = "checkbox" name = "renal" value = "rotina">
            <label for = "renal"> Raio X Renal </label>
          </div>
        </fieldset>

        <legend> Ressonância magnética: </legend>
          <div>
            <input type = "checkbox" name = "funcional" value = "rotina">
            <label for = "funcional">  Ressonância magnética funcional </label>
          </div>
          <div>
            <input type = "checkbox" name = "angiografia" value = "rotina">
            <label for = "angiografia"> Angiografia por ressonância magnética </ label>
          </div>
          <div>
            <input type = "checkbox" name = "cardiaca" value = "rotina">
            <label for = "cardiaca"> Ressonância magnética cardíaca </label>
          </div>
          <div>
            <input type = "checkbox" name = "Rmamas" value = "rotina">
            <label for = "Rmamas">  Ressonância nas mamas </label>
          </div>
            <br><label for="outros"> Outros: </label>
            <input type="text" name="outros" placeholder="Circulação sanguínea" >
        </fieldset>
        </section>