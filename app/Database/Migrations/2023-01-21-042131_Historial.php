<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Historial extends Migration
{
    public function up()
    {

        //$this->db->disableForeignKeyChecks();
        //
        $this->forge->addField([
            'idHistorial' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'descripcionEquipo' => [
                'type' => 'TEXT',
            ],
            'inventario' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'modelo' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'numeroSerie' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'marca' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'descripcionDictamen' => [
                'type' => 'TEXT'
            ],
            'asistente' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'idAsistencia' => [
                'type' => 'INT',
            ]
        ]);

        $this->forge->addKey('idHistorial', true);
        //$this->forge->addForeignKey('idAsistencia','asistencias','idAsistencia','SET NULL','CASCADE');
        $this->forge->createTable('Historial');

        //$this->db->enableForeignKeyChecks();

    }

    public function down()
    {
        //
        $this->forge->dropTable('Historial');
    }
}
