<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected int $paginacion;

    public function __construct()
    {
        // Variable global para todos los controladores que hereden de este
        $this->paginacion = 10;
    }
}
