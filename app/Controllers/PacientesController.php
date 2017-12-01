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
        if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) {
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
            header('location: /pacientes');
            exit();
        } else {
            return "erro";
        }

    }

    public function show($id)
    {
        $paciente = Pacientes::selectAll($id)[0];
        $cidades = Cidades::all();
        \App\View::make('/admin/pacientes/edit', compact('paciente','cidades'));

    }

    public function update()
    {
        $paciente = $_POST;
        if (Pacientes::update($paciente)) {
            header('Location: http://localhost:8000/pacientes');
            exit;
        };
    }

    public function delete($id)
    {
        if (Pacientes::remove($id)) {
            header('Location: http://localhost:8000/pacientes');
            exit;
        }
    }
}
