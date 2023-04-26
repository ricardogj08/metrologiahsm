<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Modelo que representa la tabla de roles de los usuarios.
 */
class RoleModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'roles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'name',
        'description',
    ];

    // Dates
    protected $useTimestamps = false;

    // Validation
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = false;
}
