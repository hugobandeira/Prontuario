<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/2/17
 * Time: 10:42 PM
 */

namespace App\Controllers;

use Slim\App;

class SecretariaMedicoController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        return \App\View::make('/secretaria/index');
    }
}