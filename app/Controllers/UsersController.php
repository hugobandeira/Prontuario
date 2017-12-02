<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 27/09/17
 * Time: 02:03
 */

namespace App\Controllers;


use App\Models\User;

class UsersController
{
    /** * Listagem de usuários */
    public function index()
    {
        $users = User::selectAll();
        \App\View::make('/admin/users/index', ['users' => $users]);
    }

    /**
     * Exibe o formulário de criação de usuário
     */
    public function create()
    {
        \App\View::make('/admin/users/create');
    }


    /**
     * Processa o formulário de criação de usuário
     */
    public function store()
    {
        $user = $_POST;
        if (User::save($user)) {
            $_SESSION['msg'] = "Usuário Salvo com sucesso";
            header('Location: /user');
            exit;
        }
    }


    /**
     * Exibe o formulário de edição de usuário
     */
    public function edit($id)
    {
        $user = User::selectAll($id)[0];

        \App\View::make('admin/users/edit', [
            'user' => $user,
        ]);
    }


    /**
     * Processa o formulário de edição de usuário
     */
    public function update()
    {
        // pega os dados do formuário
        $id = $_POST['id'];
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;

        if (User::update($id, $name, $email, $gender, $birthdate)) {
            header('Location: /');
            exit;
        }
    }


    /**
     * Remove um usuário
     */
    public function remove($id)
    {
        if (User::remove($id)) {
            header('Location: /');
            exit;
        }
    }
}