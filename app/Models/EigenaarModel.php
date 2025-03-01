<?php

namespace App\Models;
use CodeIgniter\Model;

class EigenaarModel extends Model
{
    protected $table = 'eigenaar';
    protected $allowedFields = [
        'name',
        'occupation',
        'city'
    ];

    public function getEigenaars($name = null)
    {
        if ($name === null) {
            return $this->findAll();
        }

        return $this->where(['name' => $name])->first();
        #https://codeigniter.com/user_guide/models/model.html#insert
    }

    public function getEigenaarByID($id) 
    {
        return $this->where(['id' => $id])->first();
    }

    public function getEigenaarsByNameCityAndOccupation($name, $city, $occupation)
    {
        /* TODO fix null check */
        return $this->where([
            'name' => $name,
            'city' => $city,
            'occupation' => $occupation
        ])->findAll();
    }

}