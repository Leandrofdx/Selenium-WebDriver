<?php
require ("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
echo "Olá, " . $_SESSION['usuarioNome'];
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>Relatório</title>

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
    
                <?php
               //1-conecta com o servidor de dados
                $conexao = @mysql_connect("localhost", "root", "");
                 mysql_set_charset('UTF8', $conexao);
                if ($conexao) {//testa se conseguiu conectar
                    mysql_set_charset('utf8', $conexao); //só para garantir que os dados virão em utf8


                    //2-Seleciona qual o banco utilizaremos nesse servidor de dados
                    $banco = mysql_select_db("login_nives", $conexao);


                    //3-Executa um SQL
                    $resultado = mysql_query("SELECT * FROM usuarios", $conexao);


                    //4-Consome o resultado. Se tiver
                    echo "<table border='1'>"; //crio uma tabela para exibição de dados

                    while ($linha = mysql_fetch_array($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $linha["id"] . "</td>";
                        echo "<td>" . $linha["nome"] . "</td>";
                        echo "<td>" . $linha["usuario"] . "</td>";
                        echo "<td>" . $linha["senha"] . "</td>";
                        echo "<td>" . $linha["nivel"] . "</td>";
                         echo "<td>
                         

                         <form action='alterar.php'  method='post'>
                         <input type='submit' class='editar' value='editar' target='_blank'/>
                         <input type='hidden' name='acao' value='editarUsuario' />
                         <input type='hidden' name='id' value='{$linha['id']}' />
                         <input type='hidden' name='nome' value='{$linha['nome']}' />
                         <input type='hidden' name='sobrenome' value='{$linha['usuario']}' />
                         <input type='hidden' name='email' value='{$linha['senha']}' />
                         <input type='hidden' name='senha' value='{$linha['nivel']}' />
                         </form>



                          </td>";
                        echo "<td>
                        <form action='php/functions.php'  method='post'>
                        <input type='hidden' name='acao' value='excluirUsuario' />
                         <input type='submit' class='excluir' value='excluir' />
                         <input type='hidden' name='id' value='{$linha['id']}' />
                         </form>
                         </td>";
                        echo "</tr>";
                    }
                    echo "</table>"; //finalizo tabela para exibição de dados

                    mysql_close($conexao); //5 - encerro a conexao

                } else {//caso tenha ocorrido erro na criação da conexao
                    echo "Não foi possivel conectar ao servidor de dados";
                }
                ?>
		</div>
	</body>
</html>