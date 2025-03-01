<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBebouwdInkomenComputed extends Migration
{
    
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addColumn(
            'artikel',
            [
            'computed_income_built' => [
                'type' => 'DECIMAL',
                'constraint' => [10,2],
                'default' => 0
            ]
        ]);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropColumn(
            'artikel',
            ['computed_income_built']
        );
        $this->db->enableForeignKeyChecks();
    }
}
