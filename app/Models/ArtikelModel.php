<?php

namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $allowedFields = [
        'number',
        'written_income',
        'written_size',
        'computed_income',
        'computed_size',
        'kadester_id',
        'eigenaar_id'
    ];

    public function getArtikels($number = null)
    {
        if ($number === null) {
            return $this->findAll();
        }

        return $this->where(['number' => $number])->first();
    }

}