<?php

namespace App\Repositories;

use App\Models\Penyakit;
use InfyOm\Generator\Common\BaseRepository;

class PenyakitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penyakit'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Penyakit::class;
    }
}
