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
        $agendamento = AgendarSecretaria::selectAll($id)[0];
        if ($agendamento['status'] == 'F') {
            $_SESSION['msg'] = "Agendamento está finalizado";
            header('location: /secretaria/agendamentos');
            exit();
        } else {
            return \App\View::make('secretaria/agendamento/edit', compact('agendamento', 'pacientes', 'medicos'));
        }
    }

    public function update()
    {
        $agendamento = $_POST;
        if (AgendarSecretaria::update($agendamento)) {
            $_SESSION['msg'] = "Agendamento editado com sucesso";
            header('location: /secretaria/agendamentos');
            exit;
        }
    }

    public function delete($id)
    {
        $agendamento = AgendarSecretaria::selectAll($id)[0];
        if ($agendamento['status'] == 'F') {
            $_SESSION['msg'] = "Agendamento está finalizado";
            header('location: /secretaria/agendamentos');
            exit();
        } else {
            AgendarSecretaria::remove($id);
            header('location: /secretaria/agendamentos');
            exit();
        }
    }
}