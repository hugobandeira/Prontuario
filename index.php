<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 22/09/17
 * Time: 20:39
 */

require_once __DIR__ . '/bootstrap/names.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/bootstrap/twig.php';


$route = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$route->group('/', function () use ($route) {
    $route->get('', function () {
        $LoginController = new \App\Controllers\LoginController();
        $LoginController->index();
    });
    $route->post('', function () {
        $LoginController = new \App\Controllers\LoginController();
        $LoginController->verifica();
    });
});

$route->group('/user', function () use ($route) {
// página inicial
// listagem de usuários
    $route->get('/', function () {
        $UsersController = new \App\Controllers\UsersController();
        $UsersController->index();
    });
// adição de usuário
// exibe o formulário de cadastro
    $route->get('/add', function () {
        $UsersController = new \App\Controllers\UsersController;
        $UsersController->create();
    });
// processa o formulário de cadastro
    $route->post('/add', function () {
        $UsersController = new \App\Controllers\UsersController;
        $UsersController->store();
    });
// edição de usuário
// exibe o formulário de edição
    $route->get('/edit/{id}', function ($request) {
        // pega o ID da URL
        $id = $request->getAttribute('id');
        $UsersController = new \App\Controllers\UsersController;
        $UsersController->edit($id);
    });
// processa o formulário de edição
    $route->post('/edit', function () {
        $UsersController = new \App\Controllers\UsersController;
        $UsersController->update();
    });
// remove um usuário
    $route->get('/remove/{id}', function ($request) {
        // pega o ID da URL
        $id = $request->getAttribute('id');
        $UsersController = new \App\Controllers\UsersController;
        $UsersController->remove($id);
    });
});

$route->group('/medicos', function () use ($route) {
    session_start();
    if ($_SESSION == true) {
        $route->get('', function () {
            $MedicosController = new \App\Controllers\MedicosController();
            $MedicosController->index();
        });
        $route->get('/add', function () {
            $MedicosController = new \App\Controllers\MedicosController();
            $MedicosController->create();
        });
        $route->post('/add', function () {
            $MedicosController = new \App\Controllers\MedicosController();
            $MedicosController->store();
        });
        $route->get('/edit/{id}', function ($request) {
            $id = $request->getAttribute('id');
            $MedicosController = new \App\Controllers\MedicosController();
            $MedicosController->show($id);
        });
        $route->post('/edit', function ($request) {
            $MedicosController = new \App\Controllers\MedicosController();
            $MedicosController->update();
        });

        $route->get('/delete/{id}', function ($request) {
            $id = $request->getAttribute('id');
            $MedicosController = new \App\Controllers\MedicosController();
            $MedicosController->delete($id);
        });
    } else {
        header('location:/');
    }
});

$route->group('/pacientes', function () use ($route) {
    $route->get('', function () {
        $Pacientes = new \App\Controllers\PacientesController();
        $Pacientes->index();
    });
    $route->get('/add', function ($request) {
        $Pacientes = new \App\Controllers\PacientesController();
        $Pacientes->create();
    });
    $route->post('/add', function ($request) {
        $Pacientes = new \App\Controllers\PacientesController();
        $Pacientes->store();
    });

});
return $route->run();
