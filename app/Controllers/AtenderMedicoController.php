<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/2/17
 * Time: 10:28 PM
 */

namespace App\Controllers;

use App\Models\AgendaMedico;
use App\Models\Agendamento;
use App\Models\AtendimentoMedico;

class AtenderMedicoController
{
    public function __construct()
    {
        session_start();
    }

    public function index($id)
    {
        $agendamento_id = $id;

        $_SESSION['agendamento_id'] = $id;

        return \App\View::make('/medico/agenda/atender/index', compact('agendamento_id'));
    }


    public function create()
    {
        //
    }

    public function store()
    {
        $atendimento = $_POST;
        if (AtendimentoMedico::save($atendimento)) {
            $_SESSION['msg'] = "Atendimendo salvo com sucesso";
            header('location: /medico/agenda');
            exit;
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