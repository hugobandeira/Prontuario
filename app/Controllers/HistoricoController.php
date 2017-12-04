<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/4/17
 * Time: 4:34 PM
 */

namespace App\Controllers;

use App\Models\Historico;
use App\View;

class HistoricoController
{
    public function __construct()
    {
        session_start();
    }

    public function index($id)
    {
        $agendamento = $id;

        $historico = Historico::agendamentos($id);
        return View::make('/medico/historico/index', compact('historico'));

    }

}