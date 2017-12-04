<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 6:46 PM
 */

namespace App\Controllers;

use App\Models\Evolucao;
use App\View;

class EvolucaoController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        return View::make('/medico/evolucao/index');
    }

    public function store()
    {
        $evolucao = $_POST;
        $agendamento_id = $_SESSION['agendamento_id'];
        if (Evolucao::save($evolucao, $agendamento_id)) {
            return true;
        }
    }
}
