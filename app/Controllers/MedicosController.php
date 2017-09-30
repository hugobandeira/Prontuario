<?php

namespace App\Controllers;

use App\Models\Medicos;
use App\Models\User;

class MedicosController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $medicos = array(Medicos::selectAll());
        \App\View::make('/admin/medicos/index', ['medicos' => $medicos]);

    }


    public function create()
    {
        \App\View::make('/admin/medicos/create');
    }

    public function store()
    {


        $medico = $_POST;
        if (Medicos::save($medico)) {
            header('location: /medicos');
            exit();
        } else {
            return "erro";
        }
        return header('/medicos');
    }

    public function show()
    {
        //
    }

    public function update()
    {

    }

    public
    function delete($id)
    {

    }
}