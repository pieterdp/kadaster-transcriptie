<?php

namespace App\Controllers;

use App\Models\KadasterModel;
use App\Models\ArtikelModel;
use App\Models\EigenaarModel;
use App\Models\PerceelModel;

class Artikels extends BaseController
{
    public function new()
    {
        helper('form');
        $kadasterModel = model(KadasterModel::class);


        $data = [
            'title' => 'Nieuw artikel toevoegen',
            'kadasters' => $kadasterModel->getKadasters()
        ];

        return 
            view('templates/header', $data)
            .view('artikel/create')
            .view('templates/footer');
    }

    public function create()
    {
        helper('form');

        $input_data = $this->request->getJSON();
        /*
        'number',
            'written_income',
            'written_size',
            'written_income_built',
            'kadaster_id',
            'eigenaar_name',
            'eigenaar_city',
            'eigenaar_occupation',
            'percelen' => [
            {
            'section',
            'number',
            'usage',
            'size',
            'label',
            'income_unbuilt',
            'income_built'
            }
            ]
        */


        if (! $this->validateData($input_data, [
            'number'   => 'required|max_length[255]|min_length[1]',
            'written_income'   => 'required|decimal',
            'written_income_built'   => 'decimal',
            'written_size' => 'required|decimal',
            'kadaster_id' => 'required|integer',
            'eigenaar_name' => 'required|max_length[512]',
            'eigenaar_occupation' => 'max_length[512]',
            'eigenaar_city' => 'max_length[255]',
            'percelen' => 'field_exists'
        ])) {
            return $this->new();
        }

        $input_data = $this->validator->getValidated();

        /* Validate percelen */
        if (! $this->validateData($input_data['percelen'], [
            'number'   => 'required|max_length[255]|min_length[1]',
            'section'   => 'required',
            'usage'   => 'required',
            'size'   => 'required|decimal',
            'type' => 'required',
            'income_unbuilt'   => 'required|decimal',
            'income_built'   => 'required|decimal',
        ])) {
            return $this->new();
        }
        $percelen = $this->validator->getValidated();

        $eigenaarModel = model(EigenaarModel::class);
        $artikelModel = model(ArtikelModel::class);
        $perceelModel = model(PerceelModel::class);

        /* Check if we already have this eigenaar */
        /* We check on the combo name, city, occupation and pick the first one, as we have to pick someone */
        $eigenaars = $eigenaarModel->getEigenaarsByNameCityAndOccupation($input_data['eigenaar_name'], $input_data['eigenaar_city'], $input_data['eigenaar_occupation']);

        if (count($eigenaars) > 0) {
            $eigenaar_id = $eigenaars[0]['id'];
        } else {
            $eigenaarModel->save([
                'name' => $input_data['eigenaar_name'],
                'occupation' => $input_data['eigenaar_occupation'],
                'city' => $input_data['eigenaar_city']
            ]);
            $eigenaar_id = $eigenaarModel->getInsertID();
        }

        /* Compute the income and max size */
        $computed_size = 0;
        $computed_income = 0;
        $computed_income_built = 0;

        foreach ($percelen as $perceel) {
            $computed_size = $computed_size + $perceel['size'];
            $computed_income = $computed_income + $perceel['income_unbuilt'];
            $computed_income_built = $computed_income_built + $perceel['income_built'];
        }

        $artikelModel->save([
            'number' => $input_data['number'],
            'written_income' => $input_data['written_income'],
            'written_income_built' => $input_data['written_income_built'],
            'written_size' => $input_data['written_size'],
            'kadaster_id' => $input_data['kadaster_id'],
            'eigenaar_id' => $eigenaar_id,
            'computed_income' => $computed_income,
            'computed_size' => $computed_size,
            'computed_income_built' => $computed_income_built
        ]);

        $artikel_id = $artikelModel->getInsertID();

        foreach ($percelen as $perceel) {
            $perceelModel->save([
                'number' => $perceel['number'],
                'section' => $perceel['section'],
                'usage' => $perceel['usage'],
                'size' => $perceel['size'],
                'type' => $perceel['type'],
                'income_unbuilt' => $perceel['income_unbuilt'],
                'income_built' => $perceel['income_built'],
                'artikel_id' => $artikel_id
            ]);
        }

        $data = [
            'title' => 'Nieuw artikel toevoegen'
        ];

        return 
            view('templates/header', $data)
            .view('artikel/success')
            .view('templates/footer');

    }
}