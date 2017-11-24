<?php

namespace App\Controllers;

use App\Models\Cidades;
use App\Models\Medicos;
use App\Controllers\LoginController;

class MedicosController
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
        if ($_SESSION['nivel'] == '1') {
            $medicos = array(Medicos::selectAll());
            \App\View::make('/admin/medicos/index', ['medicos' => $medicos]);

        } else {
            header('location: /home');
            exit();
        }

    }


    public function create()
    {
        $cidades = Cidades::all();
        \App\View::make('/admin/medicos/create', ['cidades' => $cidades]);
    }

    public function store()
    {
//        Não será permitido cadastros com mesmo CPF e RG.
//        Se não cidades e especialidades cadastradas não poderá concluir o cadastro do médico
        $medico = $_POST;

        if (Medicos::save($medico)) {
            header('location: /medicos');
            exit();
        } else {
            return "erro";
        }
        return header('/medicos');
    }

    public function show($id)
    {
        $medico = Medicos::selectAll($id)[0];
        $cidades = Cidades::all();
        \App\View::make('/admin/medicos/edit', ['medico' => $medico, 'cidades' => $cidades]);

    }

    public function update()
    {
        $medico = $_POST;
        if (Medicos::update($medico)) {
            header('Location: http://localhost:8000/medicos');
            exit;
        };

    }

    public function delete($id)
    {
        if (Medicos::remove($id)) {
            header('Location: http://localhost:8000/medicos');
            exit;
        }


    }
}