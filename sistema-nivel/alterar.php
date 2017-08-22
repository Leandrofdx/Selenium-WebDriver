<?php
require ("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
echo "Olá, " . $_SESSION['usuarioNome'];
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>usuario | Níveis de Acesso</title>

        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link rel="shortcut icon" href="images/ico/favicon.ico" />
        <link rel="stylesheet" href="styles/comum.css" media="screen" />
        <link rel="stylesheet" href="styles/estrutura.css" media="screen" />

        <!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]><link type="text/css" rel="stylesheet" href="styles/ie.css" media="screen" /><![endif]-->
    </head>
    <body>
    <a href="index.php">Voltar</a>
     <section class="main">
        <h1>Alteração de Dados</h1>
        <form action="acoes.php" method="post">
            <fieldset>
                <legend>Formulário de Cadastro</legend>
                <label for="nome">Nome:</label>
                <input type="text" autofocus="autofocus" placeholder="digite seu nome" name="nome" id="nome"
                value="<?php if(isset($_POST["nome"])){echo $_POST["nome"];}?>"/>
                <label for="usuario">usuario:</label>
                <input type="text" placeholder="crie um usuario" name="usuario" id="usuario"
                value="<?php if(isset($_POST["usuario"])){echo $_POST["usuario"];}?>"/>
                <label for="senha">Senha:</label>
                <input type="password" placeholder="crie uma senha" name="senha" id="senha"
                value="<?php if(isset($_POST["senha"])){echo $_POST["senha"];}?>"/>
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                        <?php
                        if($_POST["tipo"]=='0')
                        {
                           echo "<option value='0'>Usuário</option>";
                           echo "<option value='1'>Adminstrador</option>";
                        }
                        else{
                            echo "<option value='1'>Adminstrador</option>";
                           echo "<option value='0'>Usuário</option>";
                           
                        }
                        ?>
                </select>
                <input type="submit" id="continuar" value="Confirmar">
                <input type="hidden" name="id" value="<?php if(isset($_POST["id"])){echo $_POST["id"];}?>"/>
                <input type="hidden" name="acao" value="atualizarUsuario"/>
            </fieldset>
        </form>
     </section>
    </body>
</html>