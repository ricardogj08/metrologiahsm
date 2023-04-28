<?php

namespace App\Models;

use CodeIgniter\Model;
use Kodus\Helpers\UUID;

/**
 * Modelo que representa la tabla de las áreas de los clientes.
 */
class AreaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'areas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'client_id',
        'name',
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
     * Establece el UUID de la área del cliente.
     */
    protected function setID(array $data)
    {
        $data['data']['id'] = UUID::create();

        return $data;
    }

    /**
     * Establece el UUID de un grupo de áreas del cliente.
     */
    protected function setIDGroup(array $data)
    {
        foreach ($data['data'] as $itr => $value) {
            $data['data'][$itr]['id'] = UUID::create();
        }

        return $data;
    }
}
