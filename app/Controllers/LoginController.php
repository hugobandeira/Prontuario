<?php

namespace App\Controllers;


use App\Models\Login;

class LoginController
{
    public function index()
    {
        \App\View::make('/login/index');
    }

    public function verifica()
    {
        $user = array($_POST)[0];

        $usuario = array('email' => $user['email'], 'senha' => $user['senha']);
        if (Login::verifica($usuario)) {
            $_SESSION['login'] = $usuario['email'];
            var_dump($_SESSION['login']);
        }
    }
}
