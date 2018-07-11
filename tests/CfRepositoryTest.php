<?php

use App\Models\Cf;
use App\Repositories\CfRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CfRepositoryTest extends TestCase
{
    use MakeCfTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CfRepository
     */
    protected $cfRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cfRepo = App::make(CfRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCf()
    {
        $cf = $this->fakeCfData();
        $createdCf = $this->cfRepo->create($cf);
        $createdCf = $createdCf->toArray();
        $this->assertArrayHasKey('id', $createdCf);
        $this->assertNotNull($createdCf['id'], 'Created Cf must have id specified');
        $this->assertNotNull(Cf::find($createdCf['id']), 'Cf with given id must be in DB');
        $this->assertModelData($cf, $createdCf);
    }

    /**
     * @test read
     */
    public function testReadCf()
    {
        $cf = $this->makeCf();
        $dbCf = $this->cfRepo->find($cf->id);
        $dbCf = $dbCf->toArray();
        $this->assertModelData($cf->toArray(), $dbCf);
    }

    /**
     * @test update
     */
    public function testUpdateCf()
    {
        $cf = $this->makeCf();
        $fakeCf = $this->fakeCfData();
        $updatedCf = $this->cfRepo->update($fakeCf, $cf->id);
        $this->assertModelData($fakeCf, $updatedCf->toArray());
        $dbCf = $this->cfRepo->find($cf->id);
        $this->assertModelData($fakeCf, $dbCf->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCf()
    {
        $cf = $this->makeCf();
        $resp = $this->cfRepo->delete($cf->id);
        $this->assertTrue($resp);
        $this->assertNull(Cf::find($cf->id), 'Cf should not exist in DB');
    }
}
