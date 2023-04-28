<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de clientes.
 */
class AddClients extends Migration
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
            'sector_id' => [
                'type'       => 'char',
                'constraint' => 36,
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
        $this->forge->addForeignKey('sector_id', 'sectors', 'id', 'restrict', 'restrict');

        $this->forge->createTable('clients', true);
    }

    public function down()
    {
        $this->forge->dropTable('clients', true);
    }
}
