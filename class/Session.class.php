<?php

/**
 * 
 * Session = verify the session for exec the application
 * 
 */

class Session
{
    
    public function __construct()
    {
        $this->verifySession();
    }

    private function verifySession()
    {
        session_start();

        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
        {   
            // executa a página, ainda falta verificar os outros atributos de acesso...
            // setar as variaveis para evitar 
        }
        else
        {
            if(isset($_SESSION))
            {
                session_destroy();
            }

            if(is_dir("../login"))
            {
                session_destroy();
                header("location:../login"); exit;
            }
            elseif(is_dir("../../login"))
            {
                session_destroy();
                header("location:../../login"); exit;
            }
            elseif(is_dir("./login"))
            {
                session_destroy();
                header("location:./login"); exit;
            }
            else
            {
                throw new Exception("Erro no redirecionamento para a página de login...");
            }
            session_destroy();
            header("location:../login"); exit;
        }
    }
}

?>
