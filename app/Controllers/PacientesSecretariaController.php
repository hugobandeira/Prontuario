<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/4/17
 * Time: 2:31 AM
 */

namespace App\Controllers;

use App\Models\Cidades;
use App\Models\Pacientes;
use App\View;

class PacientesSecretariaController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        if ($_SESSION['nivel'] == 3) {
            $pacientes = Pacientes::all();
            return View::make('/secretaria/pacientes/index', compact('pacientes'));
        }
    }

    public function create()
    {
        $ciadades = Cidades::all();
        return View::make('/secretaria/pacientes/create', ['cidades' => $ciadades]);
    }

    public function store()
    {
        $paciente = $_POST;
        if (Pacientes::save($paciente)) {
            $_SESSION['msg'] = "Paciente cadastrado com sucesso";
            header('location: /secretaria/pacientes');
            exit();
        } else {
            header('location: /secretaria/pacientes/add');
            exit();
        }
    }

    public function show($id)
    {
        $paciente = Pacientes::selectAll($id)[0];
        $cidades = Cidades::all();
        \App\View::make('/secretaria/pacientes/edit', compact('paciente', 'cidades'));
    }

    public function update()
    {
        $paciente = $_POST;
        if (Pacientes::update($paciente)) {
            $_SESSION['msg'] = "Paciente atualizado com sucesso";
            header('location: /secretaria/pacientes');
            exit();
        } else {
            header('location: /secretaria/pacientes');
            exit();
        }
    }

    public function delete($id)
    {
        if (Pacientes::remove($id)) {
            $_SESSION['msg'] = "Paciente apagado com sucesso";
            header('location: /secretaria/pacientes');
            exit;
        } else {
            header('location: /secretaria/pacientes');
            exit;
        }
    }
}