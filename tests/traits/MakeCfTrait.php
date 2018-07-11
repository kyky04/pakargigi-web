<?php

use Faker\Factory as Faker;
use App\Models\Cf;
use App\Repositories\CfRepository;

trait MakeCfTrait
{
    /**
     * Create fake instance of Cf and save it in database
     *
     * @param array $cfFields
     * @return Cf
     */
    public function makeCf($cfFields = [])
    {
        /** @var CfRepository $cfRepo */
        $cfRepo = App::make(CfRepository::class);
        $theme = $this->fakeCfData($cfFields);
        return $cfRepo->create($theme);
    }

    /**
     * Get fake instance of Cf
     *
     * @param array $cfFields
     * @return Cf
     */
    public function fakeCf($cfFields = [])
    {
        return new Cf($this->fakeCfData($cfFields));
    }

    /**
     * Get fake data of Cf
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCfData($cfFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_penyakit' => $fake->randomDigitNotNull,
            'id_gejala' => $fake->randomDigitNotNull,
            'cf' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cfFields);
    }
}
