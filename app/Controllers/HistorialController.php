<?php

namespace App\Controllers;

use App\Models\AsistenciaModel;
use App\Models\HistorialModel;

class HistorialController extends BaseController
{
    public function index()
    {
        $data = [
            "page_title" => "Historial",
            "page_functions" => "functions_historial.js"
        ];

        echo view('templates/header', $data);
        echo view('modals/completado');
        echo view('modals/dictamen');
        echo view('historial');
        echo view('templates/footer');
    }

    public function getAll()
    {
        $asistencias = new AsistenciaModel();
        $arrData = $asistencias->where("status != 1")->findAll();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnAccion = '';

            if ($arrData[$i]['status'] == 0) {
                $btnAccion = '<button class="btn btn-danger btn-sm" onClick="ftnViewCompletado(' . $arrData[$i]['idAsistencia'] . ')" title="Sin Dictamen">NO</button>';
            } else if ($arrData[$i]['status'] == 2) {
                $btnAccion = '<button class="btn btn-success btn-sm" onClick="ftnViewDictamen(' . $arrData[$i]['idAsistencia'] . ')" title="Con Dictamen">SI</button>';
            }

            $arrData[$i]['acciones'] = '<div class="text-center">' . $btnAccion . '</div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function getCompletado($idAsistencia)
    {
        $asistencias = new AsistenciaModel();
        $arrData = $asistencias->find($idAsistencia);
        return json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function getDictamen($idAsistencia)
    {
        $db = \Config\Database::connect();
        $query = $db->table('asistencias as a');
        $query->select('*');
        $query->join('historial as h', 'a.idAsistencia = h.idAsistencia');
        $query->where('a.idAsistencia',$idAsistencia);
        $arrData = $query->get()->getResult();
        return json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }
}
