<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de prospectos.
 */
class AddProspects extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'bigint',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'state_id' => [
                'type'     => 'tinyint',
                'unsigned' => true,
            ],
            'origin_id' => [
                'type'     => 'tinyint',
                'unsigned' => true,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 128,
            ],
            'phone' => [
                'type'       => 'varchar',
                'constraint' => 15,
            ],
            'email' => [
                'type'       => 'varchar',
                'constraint' => 256,
            ],
            'company' => [
                'type'       => 'varchar',
                'constraint' => 128,
            ],
            'city' => [
                'type'       => 'varchar',
                'constraint' => 128,
            ],
            'message' => [
                'type' => 'text',
            ],
            'rating' => [
                'type'       => 'enum',
                'constraint' => ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                'default'    => '0',
            ],
            'observations' => [
                'type' => 'text',
                'null' => true,
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
        $this->forge->addForeignKey('state_id', 'states', 'id', 'restrict', 'restrict');
        $this->forge->addForeignKey('origin_id', 'origins', 'id', 'restrict', 'restrict');

        $this->forge->createTable('prospects', true);
    }

    public function down()
    {
        $this->forge->dropTable('prospects', true);
    }
}
