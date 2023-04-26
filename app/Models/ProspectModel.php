<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Modelo que representa la tabla de prospectos.
 */
class ProspectModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prospects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'state_id',
        'origin_id',
        'name',
        'phone',
        'email',
        'company',
        'city',
        'message',
        'rating',
        'observations',
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
     * Estado del prospecto.
     */
    public function state()
    {
        $this->builder()->join('states', 'states.id = prospects.state_id', 'inner');

        return $this;
    }

    /**
     * Origen del prospecto.
     */
    public function origin()
    {
        $this->builder()->join('origins', 'origins.id = prospects.origin_id', 'inner');

        return $this;
    }
}
