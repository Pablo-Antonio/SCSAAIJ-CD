<?php

namespace App\Controllers;

use App\Models\AsistenciaModel;
use App\Models\HistorialModel;

class AsistenciasController extends BaseController
{
    public function index()
    {
        $data = [
            "page_title" => "Asistencias",
            "page_functions" => "functions_asistencias.js"
        ];
        return view("templates/header", $data).view("modals/asistencia").view('asistencias').view("templates/footer");
    }

    public function getAll()
    {
        $asistencias = new AsistenciaModel();
        $arrData = $asistencias->where('status', 1)->findAll();
        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnView = '<button class="btn btn-info btn-sm btnViewAsistencia" onClick="ftnViewAsistencia(' . $arrData[$i]['idAsistencia'] . ')" title="Ver Asistencia"><i class="far fa-eye"></i></button>';
            $arrData[$i]['acciones'] = '<div class="text-center">' . $btnView . '</div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function getId($idAsistencia)
    {
        $asistencias = new AsistenciaModel();
        $arrData = $asistencias->find($idAsistencia);
        return json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function completado()
    {
        $asistencias = new AsistenciaModel();
        $idAsistencia = $this->request->getPost("idAsistencia");
        $request = $asistencias->where('idAsistencia', $idAsistencia)->set(['status' => 0])->update();

        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible completar la asistencia.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function dictamen()
    {
        $asistencias = new AsistenciaModel();
        $historial = new HistorialModel();
        $idAsistencia = $this->request->getPost("idAsistencia");
        $desEquipo = $this->request->getPost("desEquipo");
        $numSerie = $this->request->getPost("numSerie");
        $marca = $this->request->getPost("marca");
        $modelo = $this->request->getPost("modelo");
        $inventario = $this->request->getPost("inventario");
        $nombreAsistente = $this->request->getPost("nombreAsistente");
        $desDetEquipo = $this->request->getPost("desDetEquipo");

        $datos = [
            "descripcionEquipo" => $desEquipo,
            "inventario" => $inventario,
            "modelo" => $modelo,
            "numeroSerie" => $numSerie,
            "marca" => $marca,
            "asistente" => $nombreAsistente,
            "descripcionDictamen" => $desDetEquipo,
            "idAsistencia" => $idAsistencia,
        ];

        $historial->insert($datos);
        $request = $historial->getInsertID();
        if (!empty($request)) {
            $asistencias->where('idAsistencia', $idAsistencia)->set(['status' => 2])->update();
            $arrResponse = array('status' => true, 'msg' => 'Dictamen Realizado.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el dictamen.');
        }
        return json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function redirect()
    {
        return redirect()->to("pagina que se desea ir");
    }
}

/**
 * https://www.youtube.com/watch?v=1YBlGYEIXH0
 * https://www.desarrollolibre.net/blog/codeigniter/consultas-joins-para-la-base-de-datos-en-codeigniter-4
 */
