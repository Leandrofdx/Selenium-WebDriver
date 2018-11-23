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
    <a href="index.php">Voltar</a>
     <section class="main">
        <h1>Efetue seu cadastro de acesso</h1>
        <form action="acoes.php" method="post">
            <fieldset>
                <legend>Formulário de Cadastro</legend>
                <label for="nome">Nome:</label>
                <input type="text" autofocus="autofocus" placeholder="digite seu nome" name="nome" id="nome">
                <label for="usuario">Usuario:</label>
                <input type="text" placeholder="crie um usuario" name="usuario" id="usuario">
                <label for="senha">Senha:</label>
                <input type="password" placeholder="crie uma senha" name="senha" id="senha">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value=""></option>
                    <option value="0">Usuário</option>
                    <option value="1">Administrador</option>
                </select>
                <input type="submit" id="continuar" value="Confirmar">
                <input type="hidden" name="id" value="id"/>
                <input type="hidden" name="acao" value="adicionarUsuario"/>
            </fieldset>
        </form>
     </section>
    </body>
</html>
kaai
