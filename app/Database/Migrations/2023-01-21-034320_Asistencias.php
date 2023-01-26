<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Asistencias extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idAsistencia' =>[
                'type' => 'INT',
                //'constraint' => 11,
                //'unsigned' => true,
                'auto_increment' => true
            ],
            'solicitante' =>[
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'sede' =>[
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'area' =>[
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'descripcion' =>[
                'type' => 'TEXT',
            ],
            'anydesk' =>[
                'type' => 'VARCHAR',
                'constraint' => 5
            ],
            'fechaSoli' =>[
                'type' => 'DATETIME'
            ],
            'status' =>[
                'type' => 'INT',
                'default' => 1
            ],
        ]);

        //$this->forge->addPrimaryKey('idAsistencia',true);
        $this->forge->addKey('idAsistencia',true);
        $this->forge->createTable('Asistencias');
    }

    public function down()
    {
        //
        $this->forge->dropTable('Asistencias');
    }
}
