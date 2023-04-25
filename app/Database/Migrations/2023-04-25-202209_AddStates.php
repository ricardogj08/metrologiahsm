<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de estados.
 */
class AddStates extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'tinyint',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 128,
                'unique'     => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('states', true);
    }

    public function down()
    {
        $this->forge->dropTable('states', true);
    }
}
