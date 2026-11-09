<?php

namespace App\Http\Controllers;

class JogosController extends Controller
{

    public function index()
    {
        return view('Projetos.jogos');
    }
    public function store(Request $request)
    {
        // Processar os dados enviados pelo formulário
    }
}
