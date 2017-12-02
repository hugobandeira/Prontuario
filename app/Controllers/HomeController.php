<?php

namespace App\Controllers;


class HomeController
{
    public function __construct()
    {
        session_start();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        if ($_SESSION['nivel'] == 2) {
            \App\View::make('/medico/index');
        } else {
            \App\View::make('/home/index');
        }

    }


    public function create()
    {
        //
    }

    public function store()
    {
        //
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
