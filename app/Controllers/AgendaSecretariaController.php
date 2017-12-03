<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 1:04 AM
 */

namespace App\Controllers;

use App\Models\AgendarSecretaria;
use App\Models\Medicos;
use App\Models\Pacientes;

class AgendaSecretariaController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $agendamentos = AgendarSecretaria::selectAll();
        return \App\View::make('secretaria/agendamento/index', compact('agendamentos'));
    }

    public function create()
    {
        $pacientes = Pacientes::all();
        $medicos = Medicos::selectAll();
        return \App\View::make('secretaria/agendamento/create', compact('pacientes', 'medicos'));
    }

    public function store()
    {
        $agendamento = $_POST;

        if (AgendarSecretaria::save($agendamento)) {
            $_SESSION['msg'] = "Agendamento salvo com sucesso";
            header('location: /secretaria/agendamentos');
            exit();
        } else {
            return "erro";
        }
    }

    public function show($id)
    {
        $pacientes = Pacientes::all();
        $medicos = Medicos::selectAll();
        return \App\View::make('secretaria/agendamento/edit', compact('pacientes', 'medicos'));
    }

    public function update()
    {

    }

    public function delete($id)
    {
    }
}