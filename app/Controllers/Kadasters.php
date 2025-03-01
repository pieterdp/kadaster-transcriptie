<?php

namespace App\Controllers;

use App\Models\KadasterModel;
use App\Models\ArtikelModel;
use App\Models\EigenaarModel;

class Kadasters extends BaseController
{

    public function index()
    {
        $kadasterModel = model(KadasterModel::class);
        $artikelModel = model(ArtikelModel::class);
        $eigenaarModel = model(EigenaarModel::class);

        $kadasters = $kadasterModel->getKadasters();
        $kadasters_with_metadata = [];

        foreach ($kadasters as $kadaster) {
            $kadaster['artikels'] = [];
            foreach ($artikelModel->getArtikelsForKadaster($kadaster['id']) as $artikel) {
                $artikel['eigenaar'] = $eigenaarModel->getEigenaarById($artikel['eigenaar_id']);
                $kadaster['artikels'][] = $artikel;
            }
            $kadasters_with_metadata[] = $kadaster;
        }

        $data = [
            'kadasters' => $kadasters_with_metadata,
            'title' => 'Alle kadasters'
        ];

        return 
            view('templates/header', $data)
            .view('kadaster/index', $data)
            .view('templates/footer');
    }

    public function show(?string $name = null)
    {
        $model = model(KadasterModel::class);

        $data['kadaster'] = $model->getKadasters($name);
    }

    public function new()
    {
        helper('form');

        $data = [
            'title' => 'Nieuw boek toevoegen'
        ];

        return 
            view('templates/header', $data)
            .view('kadaster/create')
            .view('templates/footer');
    }

    public function create()
    {
        helper('form');

        $input_data = $this->request->getPost(['name', 'city', 'period']);

        if (! $this->validateData($input_data, [
            'name'   => 'required|max_length[255]|min_length[1]',
            'city'   => 'required|max_length[255]|min_length[1]',
            'period' => 'required|max_length[255]|min_length[4]'
        ])) {
            return $this->new();
        }

        $input_data = $this->validator->getValidated();

        $model = model(KadasterModel::class);

        $model->save([
            'name' => $input_data['name'],
            'city' => $input_data['city'],
            'period' => $input_data['period']
        ]);

        $data = [
            'title' => 'Nieuw boek toevoegen'
        ];

        return 
            view('templates/header', $data)
            .view('kadaster/success')
            .view('templates/footer');

    }

}

