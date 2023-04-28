<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de sectores de los clientes.
 */
class AddSectors extends Migration
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
                'constraint' => 128,
                'unique'     => true,
            ],
            'alias' => [
                'type'       => 'varchar',
                'constraint' => 64,
                'unique'     => true,
                'null'       => true,
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

        $this->forge->createTable('sectors', true);
    }

    public function down()
    {
        $this->forge->dropTable('sectors', true);
    }
}
