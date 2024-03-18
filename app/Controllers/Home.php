<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $dados['carrocel'] = view('loja/carrocel');
        return view('index', $dados);
    }
}
