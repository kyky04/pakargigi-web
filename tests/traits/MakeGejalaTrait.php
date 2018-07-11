<?php

use Faker\Factory as Faker;
use App\Models\Gejala;
use App\Repositories\GejalaRepository;

trait MakeGejalaTrait
{
    /**
     * Create fake instance of Gejala and save it in database
     *
     * @param array $gejalaFields
     * @return Gejala
     */
    public function makeGejala($gejalaFields = [])
    {
        /** @var GejalaRepository $gejalaRepo */
        $gejalaRepo = App::make(GejalaRepository::class);
        $theme = $this->fakeGejalaData($gejalaFields);
        return $gejalaRepo->create($theme);
    }

    /**
     * Get fake instance of Gejala
     *
     * @param array $gejalaFields
     * @return Gejala
     */
    public function fakeGejala($gejalaFields = [])
    {
        return new Gejala($this->fakeGejalaData($gejalaFields));
    }

    /**
     * Get fake data of Gejala
     *
     * @param array $postFields
     * @return array
     */
    public function fakeGejalaData($gejalaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'gejala' => $fake->word,
            'md' => $fake->word,
            'mb' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $gejalaFields);
    }
}
