<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de usuarios de acceso.
 */
class AddUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'bigint',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'unique'     => true,
            ],
            'role_id' => [
                'type'     => 'tinyint',
                'unsigned' => true,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 128,
            ],
            'password' => [
                'type'       => 'varchar',
                'constraint' => 256,
            ],
            'active' => [
                'type'       => 'tinyint',
                'constraint' => 1,
                'unsigned'   => true,
                'default'    => true,
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
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'restrict', 'restrict');

        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
