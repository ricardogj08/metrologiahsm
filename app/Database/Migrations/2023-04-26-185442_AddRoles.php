<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de roles de los usuarios.
 */
class AddRoles extends Migration
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
                'constraint' => 32,
                'unique'     => true,
            ],
            'description' => [
                'type'       => 'varchar',
                'constraint' => 64,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('roles', true);
    }

    public function down()
    {
        $this->forge->dropTable('roles', true);
    }
}
