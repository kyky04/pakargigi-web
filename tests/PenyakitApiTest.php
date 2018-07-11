<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PenyakitApiTest extends TestCase
{
    use MakePenyakitTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePenyakit()
    {
        $penyakit = $this->fakePenyakitData();
        $this->json('POST', '/api/v1/penyakits', $penyakit);

        $this->assertApiResponse($penyakit);
    }

    /**
     * @test
     */
    public function testReadPenyakit()
    {
        $penyakit = $this->makePenyakit();
        $this->json('GET', '/api/v1/penyakits/'.$penyakit->id);

        $this->assertApiResponse($penyakit->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePenyakit()
    {
        $penyakit = $this->makePenyakit();
        $editedPenyakit = $this->fakePenyakitData();

        $this->json('PUT', '/api/v1/penyakits/'.$penyakit->id, $editedPenyakit);

        $this->assertApiResponse($editedPenyakit);
    }

    /**
     * @test
     */
    public function testDeletePenyakit()
    {
        $penyakit = $this->makePenyakit();
        $this->json('DELETE', '/api/v1/penyakits/'.$penyakit->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/penyakits/'.$penyakit->id);

        $this->assertResponseStatus(404);
    }
}
