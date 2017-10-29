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
            \App\View::make('/admin/pacientes/index');

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

    public function show()
    {
        //
    }

    public function update()
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
