<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Modelo que representa la tabla de usuarios de acceso.
 */
class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'email',
        'role_id',
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
    protected $allowCallbacks = false;

    /**
     * Rol del usuario.
     */
    public function role()
    {
        $this->builder()->join('roles', 'roles.id = users.role_id', 'inner');

        return $this;
    }
}
