<! - Está é a pagina que o adiministrador vai fazer o cadastro de funcionarios ->
<? php
require_once  'classe_funcionario.php' ;
$ p = new funcionarios ( "tcc" , "localhost" , "root" , "" );
?>
<! DOCTYPE HTML >
< html  lang = ”pt-br” >

< html >
< h1 > Cadastro de funcionarios   </ h1 >

    < cabeça > 
        < title >   Administração </ title >
        < meta  charset = ”UTF-8” >
        < link  rel = " stylesheet " href = " css.css " type = " text / css " > 
        <! - LINK PARA PHP \ JS <link rel = "stylesheet" type = "text / css" media = "screen" href = "main.css"> ->
    </ head >


  < corpo >
    <? php
    if ( isset ( $ _POST [ 'nome' ]))
    {
    	$nome = adicionalashes ( $_POST [ 'nome' ]);
    	$contratacao = adicionalashes ( $_POST [ 'contratacao' ]);
    	$nasc = adicionalashes ( $_POST [ 'nasc' ]);
    	$cargo = adicionalashes ( $_POST [ 'carga' ]);
    	$salario = addslashes ( $_POST [ 'salario' ]);
    	$cpf = addslashes ( $_POST [ 'cpf' ]);
    	$rg = addslashes ( $_POST [ 'rg' ]);
    	$tel = addslashes ( $_POST [ 'tel' ]);
    	$email = addslashes ( $_POST [ 'email' ]);
    	$senha = adicionalashes ( $_POST [ 'senha' ]);

    	if (! empty ( $ nome ) &&! empty ( $contratacao ) &&! empty ( $nasc ) &&! empty ( $cargo ) &&! empty ( $salario ) &&! empty ( $cpf ) &&! empty ( $rg ) &&! empty ( $tel ) &&! empty ( $email ) &&!vazio ( $senha ))
    	{
    		if (! $ p -> cadastrarPessoas ( $nome , $contratacao , $nasc , $cargo , $salario , $cpf , $rg , $tel , $email , $senha ))
    		{
    			echo  "Usuario já cadastrado" ;
    		}
    		
    	}
    	outro
    	{
    		echo  "Preencha todos os campos" ;
    	}


    }

    ?>

    <?php
        $id = $_GET["id"];
        include_once 'conexao.php';

        $sql = "delete from cliente where idcliente = ".$id;

        if(mysql_query($sql,$con)){
            $msg = "Deletado com sucesso!";
        }else{
            $msg = "Erro ao deletar!";
        }
        mysql_close($con);

    ?> 

     <?php

        $nome =   $_POST [ 'nome' ];
        $contratacao =   $_POST [ 'contratacao' ];
        $nasc =   $_POST [ 'nasc' ];
        $cargo =  $_POST [ 'cargo' ];
        $salario =  $_POST [ 'salario' ];
        $cpf =  $_POST [ 'cpf' ];
        $rg =  $_POST [ 'rg' ];
        $tel =  $_POST [ 'tel' ];
        $email =  $_POST [ 'email' ];
        $senha =  $_POST [ 'senha' ];


        include_once 'conexao.php';

        $sql = "update cliente set
                nome = '".$nome."', contratacao = '".$contratacao."', nasc = '".$nasc."', cargo = '".$cargo."', salario = '".$salario."',
                cpc = '".$cpf."', rg = '".$rg."', tel = '".$tel."', email = '".$email."', senha = '".$senha."'
                where funcionarios = ".$id;

        if(mysql_query($sql,$con)){
            $msg = "Atualizado com sucesso!";
        }else{
            $msg = "Erro ao atualizar!";
        }
        mysql_close($con);

    ?>
        < h1 > Cadastro de funcionarios </ h1 > 
           
    
       < form  method = " POST " >

       	< seção  id = " esquerda " >
            < Br > < rótulo  para = " Nome " > Nome: </ rótulo >
            < input  type = " text " name = " nome " id = " nome " placeholder = " Ex: Gustavo dos Santos " >

            < Br > < rótulo  para = " Contratação " > Dados de Contratação: </ rótulo >
            < input  type = " text " name = " contratacao " id = " contratacao " placeholder = " 00/00/0000 " >

            < Br > < rótulo  para = " nasc " > Data de nascimento: </ rótulo >
            < input  type = " text " name = " nasc " id = " nasc " placeholder = " 00/00/0000 " >

            < Br > < rótulo  para = " carga " > Carga: </ rótulo >
            < select  name = " cargo " id = " cargo " >
			  < option  value = " medico " > Médico (a) </ option > 
			  < option  value = " secretario " > Secretario (a) </ option >
			  < option  value = " tecEnfermagem " > Técnico (a) em enfermagem </ option >
			  < option  value = " farmaceutico " > Farmacêutico (a) </ option >
			  < option  value = " administração " > Administração </ option >
			</ select >

  			< Br > < rótulo  para = " salario " > Salário: </ rótulo >
            < input  type = " text " name = " salario " id = " salario " >

            < Br > < rótulo  para = " CPF " > CPF: </ rótulo >
            < input  type = " text " name = " cpf " id = " cpf " placeholder = " Ex: XXX.XXX.XXX-XX " >

           < Br >  < rótulo  para = " rg " > RG: </ rótulo >
            < input  type = " text " name = " rg " id = " rg " placeholder = " Ex: YY.YYY.YYY-Y " >

           < Br >  < rótulo  para = " tel " > Telefone: </ rótulo >
            < input  type = " text " name = " tel " id = " tel " placeholder = " Ex: (11) 90000-0000 " >

           < Br >  < rótulo  para = " email " > e-mail </ rótulo >
            < input  type = " email " name = " email " id = " email " placeholder = " Ex: kiyote1342@gmail.com " >

            < Br > < rótulo  para = " Senha " > Senha: </ rótulo >
            < input  type = " senha " name = " senha " id = " senha " >

                
                < button  type = " submit " value = " cadastrar " > Cadastrar </ button >

            </ seção >

            < seção  id = " direita " >
            	< mesa >
            		< tr > 
            			< td > Nome </ td >
            			< td > Dados de contratação </ td >
            			< td > Salário </ td >
            			< td > Carga </ td >
            			< td > CPF </ td >
            			< td > RG </ td >
            			< td > Telefone </ td >
            			< td > Email </ td >
            			< td  colspan = " 2 " > Senha </ td >
            		</ tr >
            	<? php
            		$ dados = $ p -> buscarDados ();
            		if ( count ( $ dados )> 0 ) #se tem cadastro no banco
            		{
            			para ( $ i = 0 ; $ i < count ( $ dados ); $ i ++)
            			{
            				echo  "<tr>" ;
            				foreach ( $ dados [ $ i ] as  $ k => $ v )
            				{
            					if ( $ k ! = "id_fun" )
            					{
            						echo  "<td>" . $ v . "</td>" ;
            					}
            				} ?>
            				
            			
            			< Td > < a  href = " home.html " > Editar </ a >  < a  href =" ? Adm.php id = <? Php  echo  $ Dados [ $ i ] [ 'id_fun' ]; ?> " > Excluir </ a > </ td >
            			<? php  
            			echo  "</tr>" ;
            			}
            		}
            		else  # se o banco esta vazio
            		{
            			echo  "O banco esta vazio" ;
            		}

            	?>
            	
            		< tr >
            			< td > </ td >
            			< td > </ td >
            			< td > </ td >
            			< td > </ td >
            			< td > </ td >
            			< td > </ td >
            			< td > </ td >
            			< td > </ td >
            			< td > </ td >
            		</ tr >
            	</ mesa >
            </ seção >
    
</ p >

</ form >
</ body >
</ html >
<? php
		if ( isset ( $ _GET [ 'id_fun' ]))
		{
				$ id_func = addslashes ( $ _GET [ 'id_fun' ]);
				$ p -> excluir ( $ id_func );
				cabeçalho ( "local: adm.php" );
		}

?>
