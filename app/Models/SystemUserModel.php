<?php

namespace App\Models;

use CodeIgniter\Model;
use Kodus\Helpers\UUID;

/**
 * Modelo que representa la tabla de usuarios del sistema.
 */
class SystemUserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'system_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'email',
        'system_role_id',
        'client_id',
        'area_id',
        'office_id',
        'name',
        'password',
        'active',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks    = true;
    protected $beforeInsert      = ['setID'];
    protected $beforeInsertBatch = ['setIDGroup'];

    /**
     * Rol del usuario.
     */
    public function role()
    {
        $this->builder()->join('system_roles', 'system_roles.id = system_users.system_role_id', 'inner');

        return $this;
    }

    /**
     * Establece el UUID del usuario del sistema.
     */
    protected function setID(array $data)
    {
        $data['data']['id'] = UUID::create();

        return $data;
    }

    /**
     * Establece el UUID de un grupo de usuarios del sistema.
     */
    protected function setIDGroup(array $data)
    {
        foreach ($data['data'] as $itr => $value) {
            $data['data'][$itr]['id'] = UUID::create();
        }

        return $data;
    }
}
