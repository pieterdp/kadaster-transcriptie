<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddArtikel extends Migration
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
            'written_income' => [
                'type' => 'DECIMAL',
                'constraint' => [10,2],
                'default' => 0
            ],
            'written_size' => [
                'type' => 'DECIMAL',
                'constraint' => [10,2],
                'default' => 0
            ],
            'computed_income' => [
                'type' => 'DECIMAL',
                'constraint' => [10,2],
                'default' => 0
            ],
            'computed_size' => [
                'type' => 'DECIMAL',
                'constraint' => [10,2],
                'default' => 0
            ],
            'kadaster_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'eigenaar_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('number', false, true);
        $this->forge->addForeignKey('kadaster_id', 'kadaster', 'id');
        $this->forge->addForeignKey('eigenaar_id', 'eigenaar', 'id');
        $this->forge->createTable('artikel');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable(tableName: 'artikel');
        $this->db->enableForeignKeyChecks();
    }
}
