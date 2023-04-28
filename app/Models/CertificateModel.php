<?php

namespace App\Models;

use CodeIgniter\Model;
use Kodus\Helpers\UUID;

/**
 * Modelo que representa la tabla de certificados.
 */
class CertificateModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'certificates';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'type_id',
        'client_id',
        'area_id',
        'office_id',
        'file',
        'instrument',
        'description',
        'name',
        'received_at',
        'calibrated_at',
        'delivered_at',
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
    protected $allowCallbacks    = true;
    protected $beforeInsert      = ['setID'];
    protected $beforeInsertBatch = ['setIDGroup'];

    /**
     * Establece el UUID del certificado.
     */
    protected function setID(array $data)
    {
        $data['data']['id'] = UUID::create();

        return $data;
    }

    /**
     * Establece el UUID de un grupo de certificados.
     */
    protected function setIDGroup(array $data)
    {
        foreach ($data['data'] as $itr => $value) {
            $data['data'][$itr]['id'] = UUID::create();
        }

        return $data;
    }
}
