<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGejalaAPIRequest;
use App\Http\Requests\API\UpdateGejalaAPIRequest;
use App\Models\Gejala;
use App\Repositories\GejalaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class GejalaController
 * @package App\Http\Controllers\API
 */

class GejalaAPIController extends AppBaseController
{
    /** @var  GejalaRepository */
    private $gejalaRepository;

    public function __construct(GejalaRepository $gejalaRepo)
    {
        $this->gejalaRepository = $gejalaRepo;
    }

    /**
     * Display a listing of the Gejala.
     * GET|HEAD /gejalas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->gejalaRepository->pushCriteria(new RequestCriteria($request));
        $this->gejalaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $gejalas = $this->gejalaRepository->all();

        return $this->sendResponse($gejalas->toArray(), 'Gejalas retrieved successfully');
    }

    /**
     * Store a newly created Gejala in storage.
     * POST /gejalas
     *
     * @param CreateGejalaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGejalaAPIRequest $request)
    {
        $input = $request->all();

        $gejalas = $this->gejalaRepository->create($input);

        return $this->sendResponse($gejalas->toArray(), 'Gejala saved successfully');
    }

    /**
     * Display the specified Gejala.
     * GET|HEAD /gejalas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Gejala $gejala */
        $gejala = $this->gejalaRepository->findWithoutFail($id);

        if (empty($gejala)) {
            return $this->sendError('Gejala not found');
        }

        return $this->sendResponse($gejala->toArray(), 'Gejala retrieved successfully');
    }

    /**
     * Update the specified Gejala in storage.
     * PUT/PATCH /gejalas/{id}
     *
     * @param  int $id
     * @param UpdateGejalaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGejalaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Gejala $gejala */
        $gejala = $this->gejalaRepository->findWithoutFail($id);

        if (empty($gejala)) {
            return $this->sendError('Gejala not found');
        }

        $gejala = $this->gejalaRepository->update($input, $id);

        return $this->sendResponse($gejala->toArray(), 'Gejala updated successfully');
    }

    /**
     * Remove the specified Gejala from storage.
     * DELETE /gejalas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Gejala $gejala */
        $gejala = $this->gejalaRepository->findWithoutFail($id);

        if (empty($gejala)) {
            return $this->sendError('Gejala not found');
        }

        $gejala->delete();

        return $this->sendResponse($id, 'Gejala deleted successfully');
    }
}
