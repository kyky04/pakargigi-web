<?php

use Faker\Factory as Faker;
use App\Models\Penyakit;
use App\Repositories\PenyakitRepository;

trait MakePenyakitTrait
{
    /**
     * Create fake instance of Penyakit and save it in database
     *
     * @param array $penyakitFields
     * @return Penyakit
     */
    public function makePenyakit($penyakitFields = [])
    {
        /** @var PenyakitRepository $penyakitRepo */
        $penyakitRepo = App::make(PenyakitRepository::class);
        $theme = $this->fakePenyakitData($penyakitFields);
        return $penyakitRepo->create($theme);
    }

    /**
     * Get fake instance of Penyakit
     *
     * @param array $penyakitFields
     * @return Penyakit
     */
    public function fakePenyakit($penyakitFields = [])
    {
        return new Penyakit($this->fakePenyakitData($penyakitFields));
    }

    /**
     * Get fake data of Penyakit
     *
     * @param array $postFields
     * @return array
     */
    public function fakePenyakitData($penyakitFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'penyakit' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $penyakitFields);
    }
}
