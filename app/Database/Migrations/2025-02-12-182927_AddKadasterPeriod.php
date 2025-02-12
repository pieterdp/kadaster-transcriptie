<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKadasterPeriod extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addColumn(
            'kadaster',
            [
                'period'=> [
                    'type' => 'VARCHAR',
                    'constraint' => 255
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
            ['period']
        );
        $this->db->enableForeignKeyChecks();
    }
}
