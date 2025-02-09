<?php

namespace App\Controllers;

use App\Models\KadasterModel;

class Kadasters extends BaseController
{

    public function index()
    {
        $model = model(KadasterModel::class);

        $data = [
            'kadaster_list' => $model->getKadasters(),
            'title' => 'Alle kadasters'
        ];

        return 
            view('templates/header', $data)
            .view('kadaster/index')
            .view('templates/footer');
    }

    public function show(?string $name = null)
    {
        $model = model(KadasterModel::class);

        $data['kadaster'] = $model->getKadasters($name);
    }

}

