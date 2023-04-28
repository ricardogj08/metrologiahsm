<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de usuarios del sistema.
 */
class AddSystemUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'email' => [
                'type'       => 'varchar',
                'constraint' => 256,
                'unique'     => true,
            ],
            'system_role_id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'client_id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'area_id' => [
                'type'       => 'char',
                'constraint' => 36,
                'null'       => true,
            ],
            'office_id' => [
                'type'       => 'char',
                'constraint' => 36,
                'null'       => true,
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
                'default'    => false,
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
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'restrict', 'cascade');
        $this->forge->addForeignKey('area_id', 'areas', 'id', 'restrict', 'cascade');
        $this->forge->addForeignKey('office_id', 'offices', 'id', 'restrict', 'cascade');

        $this->forge->createTable('system_users', true);
    }

    public function down()
    {
        $this->forge->dropTable('system_users', true);
    }
}
