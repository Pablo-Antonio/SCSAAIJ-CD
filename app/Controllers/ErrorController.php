<?php

namespace App\Controllers;

class ErrorController extends BaseController
{

    public function index()
    {
        $data = [
            "page_title" => "Usuarios",
            "page_functions" => "functions_usuarios.js"
        ];
        return view("templates/header",$data) . view('error') . view("templates/footer");
    }
}
