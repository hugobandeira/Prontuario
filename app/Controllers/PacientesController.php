<?php

namespace App\Controllers;


use App\Models\Cidades;
use App\Models\Pacientes;

class PacientesController
{
    public function __construct()
    {
        session_start();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        if ($_SESSION['nivel'] == 1) {
            $pacientes = Pacientes::all();
            \App\View::make('/admin/pacientes/index', compact('pacientes'));

        } else {
            header('location: /');
            exit();
        }
    }


    public function create()
    {
        $cidades = Cidades::all();
        \App\View::make('/admin/pacientes/create', compact('cidades'));
    }

    public function store()
    {
        $paciente = $_POST;
        if (Pacientes::save($paciente)) {
            $_SESSION['msg'] = "Cadastro efetuado com sucesso";
            header('location: /admin/pacientes');
            exit();
        } else {
            $_SESSION['erro'] = "Erro ao cadastrar";
            header('location: /admin/pacientes/add');
            exit();
        }

    }

    public function show($id)
    {
        $paciente = Pacientes::selectAll($id)[0];
        $cidades = Cidades::all();
        \App\View::make('/admin/pacientes/edit', compact('paciente', 'cidades'));

    }

    public function update()
    {
        $paciente = $_POST;
        if (Pacientes::update($paciente)) {
            $_SESSION['msg'] = "Paciente atualizado com sucesso";
            header('location: /admin/pacientes');
            exit();
        } else {
            $_SESSION['erro'] = "Erro ao cadastrar";
            header('location: /admin/pacientes');
            exit();
        }
    }

    public function delete($id)
    {
        if (Pacientes::remove($id)) {
            header('/admin/pacientes');
            exit;
        }
    }
}
