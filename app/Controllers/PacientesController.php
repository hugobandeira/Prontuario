<?php

namespace App\Controllers;


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
        if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) {
            $pacientes = Pacientes::selectAll();

            \App\View::make('/admin/pacientes/index', compact('pacientes'));

        } else {
            header('location: /');
            exit();
        }
    }


    public function create()
    {
        \App\View::make('/admin/pacientes/create');
    }

    public function store()
    {
        $paciente = $_POST;
        if (Pacientes::save($paciente)) {
            header('location: /pacientes');
            exit();
        } else {
            return "erro";
        }

    }

    public function show($id)
    {
        $paciente = Pacientes::selectAll($id)[0];
        \App\View::make('/admin/pacientes/edit', compact('paciente'));

    }

    public function update()
    {
        $paciente = $_POST;
        if (Pacientes::update($paciente)) {
            header('Location: http://localhost:8000/pacientes', ['msg']);
            exit;
        };
    }

    public function delete($id)
    {
        //
    }
}
