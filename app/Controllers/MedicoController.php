<?php

namespace App\Controllers;

use App\Models\Cidades;
use App\Models\Medicos;
use App\Controllers\LoginController;

class MedicoController
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

        \App\View::make('/admin/medico/index');
        exit();
//        if ($_SESSION['nivel'] == '2') {
//            $medicos = array(Medicos::selectAll());
//            \App\View::make('/admin/medico/index');
//
//        } else {
//            header('location: /home');
//            exit();
//        }

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