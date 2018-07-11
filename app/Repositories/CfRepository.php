<?php

namespace App\Repositories;

use App\Models\Cf;
use InfyOm\Generator\Common\BaseRepository;

class CfRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_penyakit',
        'id_gejala',
        'cf'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cf::class;
    }
}
