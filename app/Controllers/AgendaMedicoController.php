<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/2/17
 * Time: 9:23 PM
 */

namespace App\Controllers;

use App\Models\AgendaMedico;

class AgendaMedicoController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        if ($_SESSION['nivel'] == 2) {
            $medicos_id = $_SESSION['id'];
            $agendas = AgendaMedico::all($medicos_id);
            \App\View::make('/medico/agenda/index', compact('agendas'));
        } else {
            \App\View::make('/');
        }
    }
}