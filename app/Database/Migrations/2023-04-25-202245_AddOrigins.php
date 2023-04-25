<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de orígenes.
 */
class AddOrigins extends Migration
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

        $this->forge->createTable('origins', true);
    }

    public function down()
    {
        $this->forge->dropTable('origin', true);
    }
}
