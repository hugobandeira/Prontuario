<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 9:42 PM
 */

namespace App\Controllers;

use App\Models\Atestado;
use App\View;

class AtestadoController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        return View::make('/medico/atestado/index');
    }

    public function store()
    {
        $atesado = $_POST;
        $agendamento_id = $_SESSION['agendamento_id'];
        if (Atestado::save($atesado, $agendamento_id)) {
            return true;
        }
    }
}