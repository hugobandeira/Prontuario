<?php


namespace App\Controllers;

class AgendamentosController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {

        \App\View::make('admin/agendamentos/index');
    }
}