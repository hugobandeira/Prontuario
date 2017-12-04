<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/4/17
 * Time: 4:39 AM
 */

namespace App\Controllers;

use App\Controllers;

use App\Models\Medicos;
use App\View;

class MedicoSecretaria
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        if ($_SESSION['nivel'] == 3) {
            $medicos = Medicos::selectAll();
            return View::make('secretaria/medicos/index', compact('medicos'));
        }
    }
}