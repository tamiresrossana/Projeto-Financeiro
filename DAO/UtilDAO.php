<?php

//Essa Classe receberá, a validação de sessao do usuário, na aula 25.
// Mas para simularmos, a utilização  do ambiente interno da aplicação, precisamos de uma accesso simulado.


class UtilDAO
{

    private static function IniciarSessao()
    {

        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function CriarSessao($cod, $nome)
    {

        self::IniciarSessao();
        $_SESSION['cod'] = $cod;
        $_SESSION['nome'] = $nome;
    }

    public static function UsuarioLogado()
    {
        self::IniciarSessao();
        //  return 1 - Esse return simula o acesso do usário de ID1 
        return $_SESSION['cod'];
    }

    public static function NomeLogado()
    {
        self::IniciarSessao();
        return $_SESSION['nome'];
    }

    public static function Deslogar()
    {
        self::IniciarSessao();
        unset($_SESSION['cod']);
        unset($_SESSION['nome']);

        header('location: login.php');
        exit();
    }

    public static function VerificarLogado()
    {
        self::IniciarSessao();

        if (!isset($_SESSION['cod']) || $_SESSION['cod'] == '') {
            header('location: login.php');
            exit();
        }
    }
}
