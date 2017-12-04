<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 6:46 PM
 */

namespace App\Controllers;

use App\Models\Sinais;

class SinaisController
{

    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        return \App\View::make('/medico/sinais/index');
    }

    public function store()
    {
        $agendamento_id = $_SESSION['agendamento_id'];
        $sinas = $_POST;
        if (Sinais::save($sinas, $agendamento_id)) {
            echo 'salvo';
        };
    }

}