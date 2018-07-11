<?php

namespace App\Repositories;

use App\Models\Gejala;
use InfyOm\Generator\Common\BaseRepository;

class GejalaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'gejala',
        'md',
        'mb'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Gejala::class;
    }
}
