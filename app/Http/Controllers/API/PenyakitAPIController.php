<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePenyakitAPIRequest;
use App\Http\Requests\API\UpdatePenyakitAPIRequest;
use App\Models\Penyakit;
use App\Repositories\PenyakitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PenyakitController
 * @package App\Http\Controllers\API
 */

class PenyakitAPIController extends AppBaseController
{
    /** @var  PenyakitRepository */
    private $penyakitRepository;

    public function __construct(PenyakitRepository $penyakitRepo)
    {
        $this->penyakitRepository = $penyakitRepo;
    }

    /**
     * Display a listing of the Penyakit.
     * GET|HEAD /penyakits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $penyakits = Penyakit::with('gejala')->get();

        return $this->sendResponse($penyakits->toArray(), 'Penyakits retrieved successfully');
    }

    /**
     * Store a newly created Penyakit in storage.
     * POST /penyakits
     *
     * @param CreatePenyakitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePenyakitAPIRequest $request)
    {
        $input = $request->all();

        $penyakits = $this->penyakitRepository->create($input);

        return $this->sendResponse($penyakits->toArray(), 'Penyakit saved successfully');
    }

    /**
     * Display the specified Penyakit.
     * GET|HEAD /penyakits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Penyakit $penyakit */
        $penyakit = $this->penyakitRepository->findWithoutFail($id);

        if (empty($penyakit)) {
            return $this->sendError('Penyakit not found');
        }

        return $this->sendResponse($penyakit->toArray(), 'Penyakit retrieved successfully');
    }

    /**
     * Update the specified Penyakit in storage.
     * PUT/PATCH /penyakits/{id}
     *
     * @param  int $id
     * @param UpdatePenyakitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenyakitAPIRequest $request)
    {
        $input = $request->all();

        /** @var Penyakit $penyakit */
        $penyakit = $this->penyakitRepository->findWithoutFail($id);

        if (empty($penyakit)) {
            return $this->sendError('Penyakit not found');
        }

        $penyakit = $this->penyakitRepository->update($input, $id);

        return $this->sendResponse($penyakit->toArray(), 'Penyakit updated successfully');
    }

    /**
     * Remove the specified Penyakit from storage.
     * DELETE /penyakits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Penyakit $penyakit */
        $penyakit = $this->penyakitRepository->findWithoutFail($id);

        if (empty($penyakit)) {
            return $this->sendError('Penyakit not found');
        }

        $penyakit->delete();

        return $this->sendResponse($id, 'Penyakit deleted successfully');
    }
}
