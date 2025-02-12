<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEigenaar extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 512
            ],
            'occupation' => [
                'type' => 'VARCHAR',
                'constraint' => 512
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('name', false, true);
        $this->forge->addKey('occupation', false, true);
        $this->forge->addKey('city', false, true);
        $this->forge->createTable('eigenaar');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable(tableName: 'eigenaar');
        $this->db->enableForeignKeyChecks();
    }
}
