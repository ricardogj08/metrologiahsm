<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de roles del sistema.
 */
class AddSystemRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 32,
                'unique'     => true,
            ],
            'description' => [
                'type'       => 'varchar',
                'constraint' => 64,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('system_roles', true);
    }

    public function down()
    {
        $this->forge->dropTable('system_roles', true);
    }
}
