<?php

namespace App\Controllers;


use App\Models\Pacientes;

class PacientesController
{
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function index()
    {

        \App\View::make('/admin/pacientes/index');

    }


    public function create()
    {
        \App\View::make('/admin/pacientes/create');
    }

    public function store()
    {
        $paciente = $_POST;
        if (Pacientes::save($paciente)) {
            header('location: /paciente');
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
