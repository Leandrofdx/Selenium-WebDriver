<?php
require ("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
echo "Olá, " . $_SESSION['usuarioNome'];
echo "Nível, " . $_SESSION['usuarioTipo'];
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Login | Níveis de Acesso</title>

        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link rel="shortcut icon" href="images/ico/favicon.ico" />
        <link rel="stylesheet" href="styles/comum.css" media="screen" />
        <link rel="stylesheet" href="styles/estrutura.css" media="screen" />

        <!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]><link type="text/css" rel="stylesheet" href="styles/ie.css" media="screen" /><![endif]-->
    </head>
    <body>

     <section class="main">
        <h1>Painel de Controle</h1>
        <a href="cadastro.php">Cadastrar Usuário</a> | 
        <a href="relatorio.php">Relatório de Usuários</a> | 
        <a href="sair.php">Sair</a>
     </section>
    </body>
</html>