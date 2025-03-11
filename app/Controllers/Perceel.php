<?php

namespace App\Controllers;

use App\Models\KadasterModel;
use App\Models\ArtikelModel;
use App\Models\EigenaarModel;
use App\Models\PerceelModel;

class Perceel extends BaseController
{
    public function new(?int $kadaster_id)
    {
        helper('form');
        $artikelModel = model(ArtikelModel::class);


        $data = [
            'title' => 'Nieuw perceel toevoegen',
            'artikelen' => $artikelModel->getArtikelsForKadaster($artikel_id)
        ];

        return 
            view('templates/header', $data)
            .view('perceel/create')
            .view('templates/footer');
    }
}
