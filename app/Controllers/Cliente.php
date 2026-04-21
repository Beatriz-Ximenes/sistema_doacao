<?php

namespace App\Controllers;

use App\Controllers\BaseController; // Importa o BaseController corretamente

class Cliente extends BaseController
{

    public function index()
    {
        return view('cliente/index');
    }

    // Método para exibir a página de cadastro
    public function cadastrar()
    {
        return view('cliente/cadastrar');
    }

}


?>