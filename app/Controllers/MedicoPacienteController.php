<?php

namespace App\Controllers;

use App\Models\Agendamento;
use App\Models\Cidades;
use App\Models\MedicoPaciente;
use App\Models\Medicos;
use App\Controllers\LoginController;

class MedicoPacienteController
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
        if ($_SESSION['nivel'] == '2') {
            $medico_id = $_SESSION['id'];
            $pacientes = MedicoPaciente::all($medico_id);
            \App\View::make('/medico/pacientes/index', compact('pacientes'));
        } else {
            header('location: /home');
            exit();
        }

    }


    public function create()
    {

    }

    public function store()
    {
    }

    public function show($id)
    {

    }

    public function update()
    {

    }

    public function delete($id)
    {

    }
}