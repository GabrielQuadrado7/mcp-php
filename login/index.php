<?php

include_once "../layout/login.layout.php";

session_start();

// caso a sessão exista rediceriona para a pagina principal 
if(isset($_SESSION["logged"]))
{
  header("location:../forms/main"); exit;
}

// verifica se os dois valores (login e senha) existem
if(isset($_POST['senha']) && isset($_POST['login']))
{
    // array para passar as informações de login e senha
    $loginAndPassword = array(
      'login' => $_POST['login'],
      'senha' => $_POST['senha']
    );

    // inclui a classe para manipulação de dados no banco
    include_once "../class/PgsqlCommands.class.php";
    $conn = new PgsqlCommands();

    try
    {
      // consulta que será feita
      $sql = "SELECT * FROM usuario WHERE login=:login AND senha=:senha";

      // capturando o resultado
      $result = $conn->select($sql, $loginAndPassword);

      // verifica se existe a permissão do usuario (dado do banco)
      if(isset($result[0]['permissoes']))
      {
        
        // verifica se a permissão é de administrador ou comum e irá montar o layout baseado nisso
        if($result[0]['permissoes'] == 'adm')
        {
          $_SESSION["logged"] = 'administrador';
          header("location:../forms/main"); exit;
        }
        elseif($result[0]['permissoes'] == 'com')
        {
          $_SESSION["logged"] = 'comum';
          header("location:../forms/main"); exit;
        }
        else
        { 
          // caso a permissão não seja nenhuma dessas ele destrói a sessão 
          session_destroy();
        }
      }
    }
    catch(Exception $e)
    {
      exit;
    }
}

?>

