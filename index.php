<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 22/09/17
 * Time: 20:39
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/init.php';

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
    $route->get('logout', function () {
        $LoginController = new \App\Controllers\LoginController();
        $LoginController->logout();
    });
});

$route->group('/home', function () use ($route) {
    $route->get('', function () {
        $HomeController = new \App\Controllers\HomeController();
        $HomeController->index();
    });
});

$route->group('/agendamentos', function () use ($route) {
    $route->get('', function () {
        $AgendamentosController = new \App\Controllers\AgendamentosController();
        $AgendamentosController->index();
    });
});

/*
 *USUARIOS CADASTRO PARA ADMIN
 */
$route->group('/user', function () use ($route) {
    $route->get('', function () {
        $UsersController = new \App\Controllers\UsersController();
        $UsersController->index();
    });

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
        $UsersController = new \App\Controllers\UsersController();
        $UsersController->update();
    });
// remove um usuário
    $route->get('/remove/{id}', function ($request) {
        // pega o ID da URL
        $id = $request->getAttribute('id');
        $UsersController = new \App\Controllers\UsersController();
        $UsersController->remove($id);
    });
});


$route->group('/medico', function () use ($route) {
    $route->get('', function () {
        $medico = new \App\Controllers\MedicoController();
        $medico->index();
    });
});


$route->group('/medicos', function () use ($route) {
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
    $route->get('/edit/{id}', function ($request) {
        $id = $request->getAttribute('id');
        $Pacientes = new \App\Controllers\PacientesController();
        $Pacientes->show($id);
    });
    $route->post('/edit', function ($request) {
        $Pacientes = new \App\Controllers\PacientesController();
        $Pacientes->update();
    });
    $route->get('/delete/{id}', function ($request) {
        $id = $request->getAttribute('id');
        $Pacientes = new  \App\Controllers\PacientesController();
        $Pacientes->delete($id);
    });

});
return $route->run();
