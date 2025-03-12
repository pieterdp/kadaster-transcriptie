<?php

namespace App\Controllers;

use App\Models\KadasterModel;
use App\Models\ArtikelModel;
use App\Models\EigenaarModel;
use App\Models\PerceelModel;

class Perceel extends BaseController
{
    public function new(?int $artikel_id)
    {
        helper('form');
        $artikelModel = model(ArtikelModel::class);
        $artikel = $artikelModel->getById($artikel_id);


        $data = [
            'title' => 'Nieuw perceel toevoegen',
            'artikel' => $artikel
        ];

        return 
            view('templates/header', $data)
            .view('perceel/create')
            .view('templates/footer');
    }

    public function create(?int $artikel_id)
    {
        helper('form');
        
        $perceelModel = model(PerceelModel::class);

        $input_data = $this->request->getPost([
            'number',
            'section',
            'usage',
            'size',
            'type',
            'income_unbuilt',
            'income_built'
        ]);

        if (! $this->validateData($input_data, [
            'number'   => 'required|max_length[255]|min_length[1]',
            'section'   => 'required',
            'usage'   => 'required',
            'size'   => 'required|decimal',
            'type' => 'required',
            'income_unbuilt'   => 'required|decimal',
            'income_built'   => 'required|decimal',
        ])) {
            return $this->new($artikel_id);
        }

        $input_data = $this->validator->getValidated();

        $perceelModel->save([
            'number' => $input_data['number'],
            'section' => $input_data['section'],
            'usage' => $input_data['usage'],
            'size' => $input_data['size'],
            'type' => $input_data['type'],
            'income_unbuilt' => $input_data['income_unbuilt'],
            'income_built' => $input_data['income_built'],
            'artikel_id' => $artikel_id
        ]);

        $data = [
            'title' => 'Nieuw perceel toevoegen'
        ];

        return 
            view('templates/header', $data)
            .view('perceel/success')
            .view('templates/footer');

    }
}
