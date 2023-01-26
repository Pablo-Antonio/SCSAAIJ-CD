<?php

namespace App\Controllers;

use App\Models\AsistenciaModel;
use App\Models\UsuariosModel;

class DashboardController extends BaseController
{

    public function index()
    {
        $data = [
            "page_title" => "Dashboard",
            "page_functions" => "functions_dasboard.js"
        ];
        return view("templates/header", $data) . view('dashboard') . view("templates/footer");
    }

    public function pendientes()
    {
        $asistencias = new AsistenciaModel();
        $cantidad = $asistencias->where('status', 1)->findAll();
        echo count($cantidad);
    }

    public function dictamenRealizado()
    {
        $asistencias = new AsistenciaModel();
        $cantidad = $asistencias->where('status', 2)->findAll();
        echo count($cantidad);
    }

    public function sinDictamen()
    {
        $asistencias = new AsistenciaModel();
        $cantidad = $asistencias->where('status', 0)->findAll();
        echo count($cantidad);
    }

    public function usuariosRegistrados()
    {
        $usuarios = new UsuariosModel();
        $cantidad = $usuarios->findAll();
        echo count($cantidad);
    }

    public function redirect()
    {
        return redirect()->to("pagina que se desea ir");
    }
}
