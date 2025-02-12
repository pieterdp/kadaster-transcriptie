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

