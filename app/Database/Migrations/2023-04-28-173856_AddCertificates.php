<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de certificados.
 */
class AddCertificates extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'type_id' => [
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
            'file' => [
                'type'       => 'varchar',
                'constraint' => 64,
                'unique'     => true,
            ],
            'instrument' => [
                'type'       => 'varchar',
                'constraint' => 128,
            ],
            'description' => [
                'type'       => 'varchar',
                'constraint' => 128,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 128,
            ],
            'received_at' => [
                'type' => 'datetime',
            ],
            'calibrated_at' => [
                'type' => 'datetime',
            ],
            'delivered_at' => [
                'type' => 'datetime',
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
        $this->forge->addForeignKey('type_id', 'types', 'id', 'restrict', 'restrict');
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'restrict', 'cascade');
        $this->forge->addForeignKey('area_id', 'areas', 'id', 'restrict', 'cascade');
        $this->forge->addForeignKey('office_id', 'offices', 'id', 'restrict', 'cascade');

        $this->forge->createTable('certificates', true);
    }

    public function down()
    {
        $this->forge->dropTable('certificates', true);
    }
}
