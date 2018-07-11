<?php

use App\Models\Gejala;
use App\Repositories\GejalaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GejalaRepositoryTest extends TestCase
{
    use MakeGejalaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var GejalaRepository
     */
    protected $gejalaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->gejalaRepo = App::make(GejalaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateGejala()
    {
        $gejala = $this->fakeGejalaData();
        $createdGejala = $this->gejalaRepo->create($gejala);
        $createdGejala = $createdGejala->toArray();
        $this->assertArrayHasKey('id', $createdGejala);
        $this->assertNotNull($createdGejala['id'], 'Created Gejala must have id specified');
        $this->assertNotNull(Gejala::find($createdGejala['id']), 'Gejala with given id must be in DB');
        $this->assertModelData($gejala, $createdGejala);
    }

    /**
     * @test read
     */
    public function testReadGejala()
    {
        $gejala = $this->makeGejala();
        $dbGejala = $this->gejalaRepo->find($gejala->id);
        $dbGejala = $dbGejala->toArray();
        $this->assertModelData($gejala->toArray(), $dbGejala);
    }

    /**
     * @test update
     */
    public function testUpdateGejala()
    {
        $gejala = $this->makeGejala();
        $fakeGejala = $this->fakeGejalaData();
        $updatedGejala = $this->gejalaRepo->update($fakeGejala, $gejala->id);
        $this->assertModelData($fakeGejala, $updatedGejala->toArray());
        $dbGejala = $this->gejalaRepo->find($gejala->id);
        $this->assertModelData($fakeGejala, $dbGejala->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteGejala()
    {
        $gejala = $this->makeGejala();
        $resp = $this->gejalaRepo->delete($gejala->id);
        $this->assertTrue($resp);
        $this->assertNull(Gejala::find($gejala->id), 'Gejala should not exist in DB');
    }
}
