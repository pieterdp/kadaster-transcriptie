<?php

namespace App\Models;
use CodeIgniter\Model;

class KadasterModel extends Model
{
    protected $table = 'kadaster';
    protected $allowedFields = [
        'name',
        'city',
        'period'
    ];

    public function getKadasters($name = null)
    {
        if ($name === null) {
            return $this->findAll();
        }

        return $this->where(['name' => $name])->first();
    }

}
