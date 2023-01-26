<?php

namespace App\Controllers;

use App\Models\AsistenciaModel;
use App\Models\UsuariosModel;

class IndexController extends BaseController
{

    public function index()
    {
        return view('index');
    }

    public function nuevaAsistencia()
    {
        date_default_timezone_set('America/Mexico_City');
        $asistencias = new AsistenciaModel();
        $fecha = date('Y-m-d H:i:s');
        $solicitante = $this->request->getPost("solicitante");
        $area = $this->request->getPost("area");
        $sede = $this->request->getPost("sede");
        $descripcion = $this->request->getPost("descripcion");
        $telefono = $this->request->getPost("telefono");
        $anydesk = $this->request->getPost("anydesk");

        $datos = [
            "solicitante" => $solicitante,
            "area" => $area,
            "sede" => $sede,
            "descripcion" => $descripcion,
            "telefono" => $telefono,
            "fechaSoli" => $fecha,
            "anydesk" => $anydesk
        ];

        $asistencias->insert($datos);
        $request = $asistencias->getInsertID();
        if (!empty($request)) {
            $arrResponse = array('status' => true, 'msg' => 'Asistencia Registrada Correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible registrar la asistencia.');
        }

        return json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function validarUsr()
    {
        $arrResponse = "";
        $usr = $this->request->getPost('usuario');
        $pass = $this->request->getPost('password');

        $usuarios = new UsuariosModel();
        $request = $usuarios->where('nomUsr', $usr)->findAll();
        if (!empty($request)) {
            if ($request[0]['status'] == 1) {
                if (password_verify(strval($pass), $request[0]['password'])) {

                    $data = [
                        'fullName' => $request[0]['nombre'] . " " . $request[0]['apePat'] . " " . $request[0]['apeMat'],
                        'session' => 'si',
                        'type' => $request[0]['tipo']
                    ];

                    $session = session();
                    $session->set($data);

                    $arrResponse = array('status' => true, 'msg' => '');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Usuario y/o contraseña incorrectos.');
                }
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Usuario Dado de Baja.');
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Usuario y/o contraseña incorrectos.');
        }

        return json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to("/");
    }
}
