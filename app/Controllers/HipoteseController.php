<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 6:46 PM
 */

namespace App\Controllers;

use App\Models\Hipotese;

class HipoteseController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        return \App\View::make('/medico/hipotese/index');
    }

    public function store()
    {
        $hipotese = $_POST;
        $agendamento_id = $_SESSION['agendamento_id'];
        if (Hipotese::save($hipotese, $agendamento_id)) {
            return true;
        }
    }

}