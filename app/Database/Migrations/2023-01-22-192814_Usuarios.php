<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "idUsr" => [
                "type" => "INT",
                'unsigned'       => true,
                "auto_increment" => true
            ],
            "nombre" => [
                "type" => "VARCHAR",
                "constraint" => 50,
            ],
            "apePat" => [
                "type" => "VARCHAR",
                "constraint" => 50
            ],
            "apeMat" => [
                "type" => "VARCHAR",
                "constraint" => 50
            ],
            "telefono" => [
                "type" => "VARCHAR",
                "constraint" => 50
            ],
            "nomUsr" => [
                "type" => "VARCHAR",
                "constraint" =>50
            ],
            "password" => [
                "type" => "VARCHAR",
                "constraint" => 100
            ],
            "tipo" => [
                "type" => "VARCHAR",
                "constraint" =>20
            ],
            "status" => [
                "type" => "ENUM",
                "constraint" => ["0","1"],
                "default" => "1"
            ]
        ]);

        $this->forge->addKey("idUsr",true);
        $this->forge->createTable("Usuarios");
    }

    public function down()
    {
        //
        $this->forge->dropTable("Usuarios");
    }
}
