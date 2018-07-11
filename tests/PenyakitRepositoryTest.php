<?php

use App\Models\Penyakit;
use App\Repositories\PenyakitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PenyakitRepositoryTest extends TestCase
{
    use MakePenyakitTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PenyakitRepository
     */
    protected $penyakitRepo;

    public function setUp()
    {
        parent::setUp();
        $this->penyakitRepo = App::make(PenyakitRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePenyakit()
    {
        $penyakit = $this->fakePenyakitData();
        $createdPenyakit = $this->penyakitRepo->create($penyakit);
        $createdPenyakit = $createdPenyakit->toArray();
        $this->assertArrayHasKey('id', $createdPenyakit);
        $this->assertNotNull($createdPenyakit['id'], 'Created Penyakit must have id specified');
        $this->assertNotNull(Penyakit::find($createdPenyakit['id']), 'Penyakit with given id must be in DB');
        $this->assertModelData($penyakit, $createdPenyakit);
    }

    /**
     * @test read
     */
    public function testReadPenyakit()
    {
        $penyakit = $this->makePenyakit();
        $dbPenyakit = $this->penyakitRepo->find($penyakit->id);
        $dbPenyakit = $dbPenyakit->toArray();
        $this->assertModelData($penyakit->toArray(), $dbPenyakit);
    }

    /**
     * @test update
     */
    public function testUpdatePenyakit()
    {
        $penyakit = $this->makePenyakit();
        $fakePenyakit = $this->fakePenyakitData();
        $updatedPenyakit = $this->penyakitRepo->update($fakePenyakit, $penyakit->id);
        $this->assertModelData($fakePenyakit, $updatedPenyakit->toArray());
        $dbPenyakit = $this->penyakitRepo->find($penyakit->id);
        $this->assertModelData($fakePenyakit, $dbPenyakit->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePenyakit()
    {
        $penyakit = $this->makePenyakit();
        $resp = $this->penyakitRepo->delete($penyakit->id);
        $this->assertTrue($resp);
        $this->assertNull(Penyakit::find($penyakit->id), 'Penyakit should not exist in DB');
    }
}
