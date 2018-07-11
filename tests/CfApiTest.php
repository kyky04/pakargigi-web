<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CfApiTest extends TestCase
{
    use MakeCfTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCf()
    {
        $cf = $this->fakeCfData();
        $this->json('POST', '/api/v1/cfs', $cf);

        $this->assertApiResponse($cf);
    }

    /**
     * @test
     */
    public function testReadCf()
    {
        $cf = $this->makeCf();
        $this->json('GET', '/api/v1/cfs/'.$cf->id);

        $this->assertApiResponse($cf->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCf()
    {
        $cf = $this->makeCf();
        $editedCf = $this->fakeCfData();

        $this->json('PUT', '/api/v1/cfs/'.$cf->id, $editedCf);

        $this->assertApiResponse($editedCf);
    }

    /**
     * @test
     */
    public function testDeleteCf()
    {
        $cf = $this->makeCf();
        $this->json('DELETE', '/api/v1/cfs/'.$cf->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cfs/'.$cf->id);

        $this->assertResponseStatus(404);
    }
}
