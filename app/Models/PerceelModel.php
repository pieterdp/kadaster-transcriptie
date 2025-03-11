<?php

namespace App\Models;
use CodeIgniter\Model;

class PerceelModel extends Model
{
    protected $table = 'perceel';
    protected $allowedFields = [
        'number',
        'section',
        'usage',
        'size',
        'type',
        'income_unbuilt',
        'income_built',
        'artikel_id'
    ];

    public function getPercelen($number = null)
    {
        if ($number === null) {
            return $this->findAll();
        }

        return $this->where(['number' => $number])->first();
    }

    public function getPercelenForArtikel($artikel_id)
    {
        return $this->where(['artikel-id' => $artikel_id])->findAll();
    }

}