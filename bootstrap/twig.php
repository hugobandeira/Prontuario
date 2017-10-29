<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 28/09/17
 * Time: 23:53
 */

namespace Bootstrap;
class Twig
{
    private $twig;

    public function __construct()
    {
        $template = __DIR__ . '/../app/Views';
        $loader = new \Twig_Loader_Filesystem($template);
        $this->twig = new \Twig_Environment($loader);
    }

    public function getTwig()
    {
        return $this->twig;
    }
}