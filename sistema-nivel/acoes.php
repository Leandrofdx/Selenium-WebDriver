<?php
$conexao=@mysql_connect("localhost", "root", "");//crio a conexao com o servidor
if($conexao)
{
    mysql_set_charset("utf8", $conexao);//seleciono o tipo de caracteres que esta conexao retornará
    mysql_select_db("login-niveis", $conexao);//seleciono o banco de dados do servidor
}
else
{
    echo "não foi possivel conectar ao servidor de dados";
}

if(isset($_POST))//se tiver sido enviado algum post para esta página ela executa alguma ação
{
    switch($_POST["acao"])
    {
        case "excluirUsuario"://se tiver sido solicitada a exclusão de um usuário
            excluirUsuario($_POST['id']);
            break;
        case "adicionarUsuario"://se tiver sido solicitada a adição de um usuário    
            adicionarUsuario($_POST["nome"], $_POST["usuario"], $_POST["senha"], $_POST["tipo"]);
            break;
        case "atualizarUsuario"://se tiver sido solicitada a adição de um usuário
            atualizarUsuario($_POST["id"], $_POST["nome"], $_POST["usuario"], $_POST["senha"], $_POST["tipo"]);
            break;
        default:
            echo "nenhuma ação foi selecionada<br/>";
            echo "<a href='".$_SERVER["HTTP_REFERER"]."'>Voltar para a página anterior</a>";
            die();
    }
    mysql_close($conexao);//fecho a conexao com o banco
    // header("location:".$_SERVER["HTTP_REFERER"]);//redireciono para a página que invocou o script
        header("Location: relatorio.php");
    
}


function adicionarUsuario($nome, $usuario, $senha, $tipo) {
    global $conexao;
    $sql="INSERT INTO usuarios (nome, usuario, senha, tipo) VALUES('$nome','$usuario','$senha','$tipo');";
    //crio a query a ser executada
    $resultado=mysql_query($sql, $conexao);
    //no caso de "insert" o resultado armazenará o numero de registros afetados 
    if($resultado)
    {
        return false;   
    }
    else
    {
        return true;
    }      
}

function excluirUsuario($id){
    global $conexao;//me refiro à conexao global criada no inicio do script
    $sql="DELETE FROM usuarios WHERE usu_id=".$id.";";//crio a query a ser executada
    $resultado=mysql_query($sql, $conexao);//no caso de delete o resultado armazenará o numero de registros afetados 
    if($resultado<1)
    {
     return false;   
    }
    else
    {
        return true;
    }    
}

function atualizarUsuario($id, $nome, $usuario, $senha, $tipo) {
     global $conexao;
     $sql="UPDATE usuarios SET nome='{$_POST['nome']}', usuario='{$_POST['usuario']}', senha='{$_POST['senha']}', tipo='{$_POST['tipo']}'
     WHERE usu_id=".$id.";";
     $resultado=mysql_query($sql, $conexao);//no caso de delete o resultado armazenará o numero de registros afetados 
        if($resultado<1)
    {
     echo "opa";
    }
    else
    {
        echo "opa";
    }

}

?>