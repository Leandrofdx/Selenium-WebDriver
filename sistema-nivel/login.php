<?php 

// Inclui o arquivo com o sistema de segurança
include("seguranca.php");

// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Salva duas variáveis com o que foi digitado no formulário
// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';

// Utiliza uma função criada no seguranca.php pra validar os dados digitados
if (validaUsuario($usuario, $senha) == true) {
// O usuário e a senha digitados foram validados, manda pra página interna
header("Location: index.php");
} else {

$_SESSION = array();
unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
setcookie(session_name(), '', time()-42000, '/');
session_destroy();
// O usuário e/ou a senha são inválidos, manda de volta pro form de login
// Para alterar o endereço da página de login, verifique o arquivo seguranca.php
// expulsaVisitante();
// echo "<script>alert('login incorreto!');</script>";
echo "Acesso Negado";
}
} 

 ?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title> Login</title>

		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link rel="shortcut icon" href="images/ico/favicon.ico" />
		<link rel="stylesheet" href="styles/comum.css" media="screen" />
		<link rel="stylesheet" href="styles/estrutura.css" media="screen" />

		<!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<!--[if IE 7]><link type="text/css" rel="stylesheet" href="styles/ie.css" media="screen" /><![endif]-->
	</head>
	<body>
		<div class="login">
			<h2>Efetue seu Login</h2>
			<form action="login.php" method="post">
				<fieldset>
					<legend>Formulário Login</legend>
						<input type="text" id="usuario" name="usuario" autofocus="autofocus" placeholder="Usuário"/>
						<input type="password" id="senha" name="senha" placeholder="Senha"/>
						<input type="hidden" name="acao" value="acesso"/>
						<input type="submit" class="botao-entrar" name="entrar" value="Entrar">
				</fieldset>
			</form>
			<a href="esqueciSenha.php">Esquci minha senha.</a>
		</div>
		<script>window.jQuery || document.write('<script src="scripts/jquery.js"><\/script>')</script>
		<script src="scripts/jquery.js"></script>
		<script src="scripts/base.js"></script>
	</body>
</html>