<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class idadeController extends Controller
{
    public function index()
    {
        return view('Projetos.idade');
    }
}