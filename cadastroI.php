<!--NESTA PPAGINA A SECRETARIA VAI REALIZAR O CADASTRO DO USUARIO E DO ENDERECO(FRONT END)-->
<?php
require_once 'classe_usuario.php';
$p = new usuarios("tcc","localhost","root","");
?>
<!DOCTYPE html>
<html lang=”pt-br”>
<html>
<h1> Cadastro usuario </h1>

    <head> 
        <title>  Tela de cadastro </title>
        <meta charset= "utf-8" >
        <link rel= "stylesheet" href="css.css" type="text/css">
        <!-- LINK PARA PHP\JS <link rel="stylesheet" type="text/css" media="screen" href="main.css"> -->
        <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
        
    };

    </script>
    </head>


  <body>
    <?php
    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $cpf = addslashes($_POST['cpf']);
        $rg = addslashes($_POST['rg']);
        $nasc = addslashes($_POST['nasc']);
        $sexo = addslashes($_POST['sexo']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if(!empty($nome) && !empty($cpf) && !empty($nasc) && !empty($rg) && !empty($email) && !empty($senha))
        {
            if(!$p->cadastrarPessoas($nome,$cpf,$rg,$nasc,$sexo,$email,$senha))
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
    <?php
    if(isset($_POST['cep']))
    {
        $telefone = addslashes($_POST['telefone']);
        $cep = addslashes($_POST['cep']);
        $endereco = addslashes($_POST['rua']);
        $bairro = addslashes($_POST['bairro']);
        $cidade = addslashes($_POST['cidade']);
        $estado = addslashes($_POST['uf']);
        $numero = addslashes($_POST['numero']);
       
        if(!empty($cep) && !empty($endereco) && !empty($bairro) && !empty($cidade) && !empty($estado) && !empty($numero)&& !empty($telefone))
        {
            if(!$p->endereco($telefone,$cep,$endereco,$bairro,$cidade,$estado,$numero))
            {
                 echo "oi";
            }
            
        }
        else
        {
            echo "Preencha todos os campos";
        }


    }


    ?>
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
    
       <form  method="POST">
        <section id="esquerda">
             <h3> Dados pessoais </h3>
            <br><label for="nome">Nome: </label>
            <input type="text" name="nome"  id="nome" placeholder="Ex: Paula Gomes" >

            <br><label for="cpf"> CPF: </label>
            <input type="text" name="cpf" id="cpf" placeholder="Ex: XXX.XXX.XXX-XX" >

            <br><label for="rg"> RG: </label>
            <input type="text" name="rg"  id="rg" placeholder="Ex: YY.YYY.YYY-Y" >

            <br><label for="nasc">Data de nascimento: </label>
            <input id="nasc" type="text" name = "nasc" placeholder="00/00/0000">

            <br><label for="sexo">Sexo </label>
            <select name="sexo">
                <option value="">Selecione</option>
                <option name = "M" value="M"> Masculino </option>
                <option name = "F" value="F"> Feminino</option>
                <option name = "0" value="0"> Não binario</option>

            <br><label for="email"> Email </label>
            <input type="email" name="email" id="email" placeholder="Ex: kiyote1342@gmail.com" >

            <br><label for="senha"> senha: </label>
            <input type="password" name="senha" id="senha">
            </select>

            <p><a href="login.php"> Já tenho cadastro </p></a>

                <button type="submit" value="cadastrar"> Cadastrar </button>
        </p></section>
       <section id="direita">
            <h3> Endereço</h3>

            <label>telefone:
        <input name="telefone" type="text" id="telefone" size="30" placeholder="(11)90000-0000" /></label><br />
        <label>Cep:
        <input placeholder="Ex:06784-220" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua" size="60" /></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" /></label><br />
        <label>numero:
        <input name="numero" type="text" id="numero" size="4" placeholder="396"  /></label><br />
        <input type="submit" value="Cadastrar">
        </section>     
    
</p>

</form>
</body>
</html>        