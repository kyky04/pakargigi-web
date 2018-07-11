<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GejalaApiTest extends TestCase
{
    use MakeGejalaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateGejala()
    {
        $gejala = $this->fakeGejalaData();
        $this->json('POST', '/api/v1/gejalas', $gejala);

        $this->assertApiResponse($gejala);
    }

    /**
     * @test
     */
    public function testReadGejala()
    {
        $gejala = $this->makeGejala();
        $this->json('GET', '/api/v1/gejalas/'.$gejala->id);

        $this->assertApiResponse($gejala->toArray());
    }

    /**
     * @test
     */
    public function testUpdateGejala()
    {
        $gejala = $this->makeGejala();
        $editedGejala = $this->fakeGejalaData();

        $this->json('PUT', '/api/v1/gejalas/'.$gejala->id, $editedGejala);

        $this->assertApiResponse($editedGejala);
    }

    /**
     * @test
     */
    public function testDeleteGejala()
    {
        $gejala = $this->makeGejala();
        $this->json('DELETE', '/api/v1/gejalas/'.$gejala->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/gejalas/'.$gejala->id);

        $this->assertResponseStatus(404);
    }
}
