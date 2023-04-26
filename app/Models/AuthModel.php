<?php

namespace App\Models;

use CodeIgniter\Model;
use Kodus\Helpers\UUID;

/**
 * Modelo que representa la tabla de autenticaciones.
 */
class AuthModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'auth';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'user_id',
        'secret',
        'expires_at',
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
     * Establece el UUID de la autenticación.
     */
    protected function setID(array $data)
    {
        $data['data']['id'] = UUID::create();

        return $data;
    }

    /**
     * Establece el UUID de un grupo de autenticaciones.
     */
    protected function setIDGroup(array $data)
    {
        foreach ($data['data'] as $itr => $value) {
            $data['data'][$itr]['id'] = UUID::create();
        }

        return $data;
    }

    /**
     * Usuario de la autenticación.
     */
    public function user()
    {
        $this->builder()->join('users', 'users.id = auth.user_id', 'inner');

        return $this;
    }
}
