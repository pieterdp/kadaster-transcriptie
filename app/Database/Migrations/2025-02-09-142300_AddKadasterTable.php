<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKadasterTable extends Migration
{
    public function up()
    {
        //
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'kadaster_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]

        ]);
        $this->forge->addKey('kadaster_id', true);
        $this->forge->addKey('name', false, true);
        $this->forge->addKey('city');
        $this->forge->createTable('kadaster');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('kadaster');
    }
}
