<?php
require ("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
echo "Olá, " . $_SESSION['usuarioNome'];
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>Visualizar</title>

		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link rel="shortcut icon" href="images/ico/favicon.ico" />
		<link rel="stylesheet" href="styles/comum.css" media="screen" />
		<link rel="stylesheet" href="styles/estrutura.css" media="screen" />

		<!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<!--[if IE 7]><link type="text/css" rel="stylesheet" href="styles/ie.css" media="screen" /><![endif]-->
	</head>
	<body>
		<div class="cadastro">
			<h1>Dados Cadastrados</h1>
			<h2>Visualização</h2>
            <a href="index.php">Menu</a>
      
                <!--Listagem de usuários-->
                <div style="width:90%; margin-top: 50px; margin-bottom: 50px; margin-left: auto; margin-right: auto;">
                <?php
                
                
                //1-conecta com o servidor de dados                
                $conexao = @mysql_connect("localhost", "root", "");
                if ($conexao) {//testa se conseguiu conectar
                    mysql_set_charset('utf8', $conexao); //só para garantir que os dados virão em utf8

                    
                    //2-Seleciona qual o banco utilizaremos nesse servidor de dados
                    $banco = mysql_select_db("login_nives", $conexao);

                    
                    //3-Executa um SQL
                    $resultado = mysql_query("SELECT * FROM usuarios", $conexao);


                    //4-Consome o resultado. Se tiver
                    echo "<table border='1' class='Usuarios' style='border: 1px solid #ffff;'>"; //crio uma tabela para exibição de dados
                    echo "<caption>Tabela de usuários.</caption>";
                  
                    echo "<thead>";
                    echo "<th>"."ID"."</th>";
                    echo "<th>"."Nome"."</th>";
                    echo "<th>"."Login"."</th>";
                    echo "<th>"."Senha"."</th>";
                    echo "<th>"."Tipo"."</th>";
                    echo "<th>"."Alterar"."</th>";
                    echo "<th>"."Excluir"."</th>";
                    echo "</thead>";
                    
                    echo "<tbody>";
                    

                    while ($linha = mysql_fetch_array($resultado)) {
                        echo "<tr>";
            
                        echo "<td style='text-align:center;'>" . $linha["usu_id"] . "</td>";
                        echo "<td>" . $linha["nome"] . "</td>";
                        echo "<td>" . $linha["usuario"] . "</td>";
                        echo "<td>" . $linha["senha"] . "</td>";


                        //testo o valor do campo tipo, e coloco o texto apropriado na tabela
                        if ($linha["tipo"] == "0") {//0=usuário, 1=administrador
                            echo "<td>" . "Usuário comum" . "</td>";
                        } else {

                            echo "<td>";
                            echo "Administrador";
                            echo "</td>";

                       }
                        echo "<td>
                        
                         <form action='Alterar.php'  method='post'>
                         <input type='submit' class='editar' value='editar' target='_blank'/>
                         <input type='hidden' name='id' value='{$linha['usu_id']}' />
                         <input type='hidden' name='nome' value='{$linha['nome']}' />
                         <input type='hidden' name='usuario' value='{$linha['usuario']}' />
                         <input type='hidden' name='senha' value='{$linha['senha']}' />
                         <input type='hidden' name='tipo' value='{$linha['tipo']}' />
                         </form>
                          </td>";
                        
                        echo "<td>
                                <form action='acoes.php'  method='post'>
                                <input type='submit' class='excluir' value='excluir' />
                                <input type='hidden' name='id' value='{$linha['usu_id']}' />
                                <input type='hidden' name='acao' value='excluirUsuario' />
                                </form>
                                 </td>";
                        echo "</tr>";
                    }


                    echo "</tbody>";
                    
                    echo "<tfoot>";
                    echo "</tfoot>";
                    
                    echo "</table>";

                    mysql_close($conexao); //5 - encerro a conexao
                    
                    
                } else {//caso tenha ocorrido erro na criação da conexao
                    echo "Não foi possivel conectar ao servidor de dados";
                }
                ?>
		</div>
	</body>
</html>