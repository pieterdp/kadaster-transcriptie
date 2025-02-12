<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKadasterPermalink extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addColumn(
            'kadaster',
            [
                'permalink'=> [
                    'type' => 'VARCHAR',
                    'constraint' => 512
                ]
            ]
        );
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropColumn(
            'kadaster',
            ['permalink']
        );
        $this->db->enableForeignKeyChecks();
    }
}
