<?php

namespace App\Controllers;

use App\Models\UsuariosModel;


class UsuariosController extends BaseController
{

    public function index()
    {
        $data = [
            "page_title" => "Usuarios",
            "page_functions" => "functions_usuarios.js"
        ];

        echo view("templates/header", $data);
        echo view("modals/verUsr");
        echo view("modals/updateUsr");
        echo view("modals/nuevoUsr");
        echo view('usuarios');
        echo view("templates/footer");
    }

    public function getAll()
    {
        //$usuarios = model('UsuariosModel');
        $usuarios = new UsuariosModel();
        $arrData = $usuarios->findAll();

        for ($i = 0; $i < count($arrData); $i++) {

            $btnView = '';
            $btnUpd = '';
            $btnAcc = '';

            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<small class="badge badge-success" >Activo</small>';
                $btnAcc = '<button class="btn btn-danger btn-sm" onClick="ftnAccUsr(' . $arrData[$i]['idUsr'] . ',0)" title="Desactivar"><i class="fas fa-toggle-off"></i></button>';
            } else {
                $arrData[$i]['status'] = '<small class="badge badge-danger" >Inactivo</small>';
                $btnAcc = '<button class="btn btn-success btn-sm" onClick="ftnAccUsr(' . $arrData[$i]['idUsr'] . ',1)" title="Activar"><i class="fas fa-toggle-on"></i></button>';
            }

            $btnView = '<button class="btn btn-info btn-sm" onClick="ftnViewUsr(' . $arrData[$i]['idUsr'] . ')" title="Ver Usuario"><i class="far fa-eye"></i></button>';
            $btnUpd = '<button class="btn btn-primary btn-sm" onClick="viewFormUpd(' . $arrData[$i]['idUsr'] . ')" title="Actualizar Usuario"><i class="fas fa-user-edit"></i></button>';

            $arrData[$i]['acciones'] = '<div class="text-center">' . $btnView . ' ' . $btnUpd . ' ' . $btnAcc . '</div>';
        }
        return json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function getId($idUser)
    {
        $usuarios = new UsuariosModel();
        $arrData = $usuarios->find($idUser);
        return json_encode($arrData, JSON_UNESCAPED_UNICODE);
    }

    public function new()
    {
        $arrResponse = "";
        $usuarios = new UsuariosModel();
        $nombre = $this->request->getPost("nombre");
        $apePat = $this->request->getPost("apePat");
        $apeMat = $this->request->getPost("apeMat");
        $telefono = $this->request->getPost("telefono");
        $nombreUsr = $this->request->getPost("nombreUsr");
        $password = $this->request->getPost("password");
        $tipo = $this->request->getPost("tipo");
        $password = password_hash(strval($password), PASSWORD_DEFAULT);

        $request = $usuarios->where('nomUsr', $nombreUsr)->findAll();

        if (!empty($request)) {
            $arrResponse = array('status' => false, 'msg' => 'Ya existe el nombre de usuario.');
        } else {
            $datos = [
                "nombre" => $nombre,
                "apePat" => $apePat,
                "apeMat" => $apeMat,
                "telefono" => $telefono,
                "nomUsr" => $nombreUsr,
                "password" => $password,
                "tipo" => $tipo
            ];

            $usuarios->insert($datos);
            $request = $usuarios->getInsertID();
            if (!empty($request)) {
                $arrResponse = array('status' => true, 'msg' => 'Usuario Agregado Correctamente.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible registrar el usuario.');
            }
        }
        return json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function update()
    {
        $usuarios = new UsuariosModel();
        $idUser = $this->request->getPost("idUsuario");
        $nombre = $this->request->getPost("nombreUpd");
        $apePat = $this->request->getPost("apePatUpd");
        $apeMat = $this->request->getPost("apeMatUpd");
        $telefono = $this->request->getPost("telefonoUpd");
        $nombreUsr = $this->request->getPost("nombreUsrUpd");
        $password = $this->request->getPost("passwordUpd");
        $tipo = $this->request->getPost("tipoUpd");
        $password = password_hash(strval($password), PASSWORD_DEFAULT);
        $datos = [
            //"idUsuario" =>  $idUser,
            "nombre" => $nombre,
            "apePat" => $apePat,
            "apeMat" => $apeMat,
            "telefono" => $telefono,
            "nomUsr" => $nombreUsr,
            "password" => $password,
            "tipo" => $tipo
        ];

        //$usuarios->where("idUsr",$idUser)->update($datos);
        $request = $usuarios->update($idUser, $datos);
        if ($request > 0) {
            $arrResponse = array('status' => true, 'msg' => 'Usuario Actualizado Correctamente.');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'No es posible actualizar el usuario.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function actDes()
    {
        $bandera = false;
        $msg = "";
        $usuarios = new UsuariosModel();
        $idUser = $this->request->getPost("idUsuario");
        $opcion = $this->request->getPost("opcion");

        $request = $usuarios->where('idUsr', $idUser)->set(['status' => $opcion])->update();

        if ($request > 0) {
            if ($opcion == 0) {
                $msg = "Usuario Desactivado.";
                $bandera = true;
            } else {
                $msg = "Usuario Activado.";
                $bandera = true;
            }
        } else {
            if ($opcion == 0) {
                $msg = "No es posible Desactivar el usuario";
                $bandera = false;
            } else {
                $msg = "No es posible Activar el usuario";
                $bandera = false;
            }
        }
        $arrResponse = array('status' => $bandera, 'msg' => $msg);
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
