<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 27/09/17
 * Time: 01:27
 */

// diretório base da aplicação
define('BASE_PATH', dirname(__FILE__));

// credenciais de acesso ao MySQL
define('MYSQL_HOST', 'mysql762.umbler.com:41890');
define('MYSQL_USER', 'prontuariohugo');
define('MYSQL_PASS', 'hugo1234');
define('MYSQL_DBNAME', 'prontuariohugo');

// configurações do PHP
ini_set('display_errors', true);
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
