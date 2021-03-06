<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 6:46 PM
 */

namespace App\Controllers;

use App\Models\Prescricao;
use \App\View;

class PrescricaoController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        return View::make('/medico/prescricao/index');
    }

    public function store()
    {
        $prescricao = $_POST;
        $agendamento_id = $_SESSION['agendamento_id'];
        if (Prescricao::save($prescricao, $agendamento_id)) {
            return true;
        }
    }
}