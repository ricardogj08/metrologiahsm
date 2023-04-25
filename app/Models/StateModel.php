<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Modelo que representa la tabla de estados.
 */
class StateModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'states';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useTimestamps = false;

    // Validation
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = false;
}
