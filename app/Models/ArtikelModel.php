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
        'written_income_built',
        'computed_income',
        'computed_size',
        'computed_income_built',
        'kadaster_id',
        'eigenaar_id'
    ];

    public function getArtikels($number = null)
    {
        if ($number === null) {
            return $this->findAll();
        }

        return $this->where(['number' => $number])->first();
    }

    public function getArtikelsForKadaster($kadaster_id)
    {
        return $this->where(['kadaster_id' => $kadaster_id])->findAll();
    }

}