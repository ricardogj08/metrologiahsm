<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de autenticaciones.
 */
class AddAuth extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'user_id' => [
                'type'     => 'bigint',
                'unsigned' => true,
                'unique'   => true,
            ],
            'secret' => [
                'type'       => 'varchar',
                'constraint' => 256,
            ],
            'expires_at' => [
                'type' => 'datetime',
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'restrict', 'cascade');

        $this->forge->createTable('auth', true);
    }

    public function down()
    {
        $this->forge->dropTable('auth', true);
    }
}
