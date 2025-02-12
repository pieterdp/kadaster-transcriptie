<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPerceel extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'number' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'section' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'usage' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'size' => [
                'type' => 'DECIMAL',
                'constraint' => [10,2],
                'default' => 0
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'income_unbuilt' => [
                'type' => 'DECIMAL',
                'constraint' => [10,2],
                'default' => 0
            ],
            'income_built' => [
                'type' => 'DECIMAL',
                'constraint' => [10,2],
                'default' => 0
            ],
            'artikel_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('number', false, true);
        $this->forge->addForeignKey('artikel_id', 'artikel', 'id');
        $this->forge->createTable('perceel');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable(tableName: 'perceel');
        $this->db->enableForeignKeyChecks();
    }
}
