<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        //var_dump($_SESSION);
        if (isset($_SESSION['nome'])) {
            header('location: /admin/home');
            exit();
        } else {
            \App\View::make('login/index');

        }
    }

    public function verifica()
    {
        $usuario = $_POST['user'];
        $senha = md5($_POST['senha']);
        $user = Login::teste($usuario, $senha)[0];
        if (isset($user)) {
            $_SESSION = $user;
            $_SESSION['nome'] = strtoupper($user['name']);
            $_SESSION['nivel'] = $user['nivel'];
            if ($user['nivel'] == '1') {
                header('location: /admin/home');
                exit;
            } elseif ($user['nivel'] == '2') {
                header('location: /medico');
                exit();
            } elseif ($user['nivel'] == '3') {
                header('location: /secretaria');
                exit();
            }
        } else {
            \App\View::make('/login/index', ['msg' => 'usuario não existe']);
        }
    }

    public function logout()
    {
        session_destroy();
        session_start();
        header('location: /');
        exit();
    }


}
