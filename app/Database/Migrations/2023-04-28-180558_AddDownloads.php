<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migración que crea la tabla de descargas.
 */
class AddDownloads extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'certificate_id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'system_user_id' => [
                'type'       => 'char',
                'constraint' => 36,
            ],
            'redownload' => [
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
        $this->forge->addForeignKey('certificate_id', 'certificates', 'id', 'restrict', 'cascade');
        $this->forge->addForeignKey('system_user_id', 'system_users', 'id', 'restrict', 'cascade');
        $this->forge->addUniqueKey(['certificate_id', 'system_user_id']);

        $this->forge->createTable('downloads', true);
    }

    public function down()
    {
        $this->forge->dropTable('downloads', true);
    }
}
