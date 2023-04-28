<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de sucursales de los clientes.
 */
class AddOffices extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'client_id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 128,
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
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'restrict', 'restrict');
        $this->forge->addUniqueKey(['client_id', 'name']);

        $this->forge->createTable('offices', true);
    }

    public function down()
    {
        $this->forge->dropTable('offices', true);
    }
}
