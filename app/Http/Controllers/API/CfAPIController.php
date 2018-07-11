<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCfAPIRequest;
use App\Http\Requests\API\UpdateCfAPIRequest;
use App\Models\Cf;
use App\Repositories\CfRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CfController
 * @package App\Http\Controllers\API
 */

class CfAPIController extends AppBaseController
{
    /** @var  CfRepository */
    private $cfRepository;

    public function __construct(CfRepository $cfRepo)
    {
        $this->cfRepository = $cfRepo;
    }

    /**
     * Display a listing of the Cf.
     * GET|HEAD /cfs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cfs = Cf::all();
        return $this->sendResponse($cfs->toArray(), 'Cfs retrieved successfully');
    }

     public function getPenyakit(Request $request)
    {   
        $data;
        $data = $request->id_gejala;
        // dd($data);
        $cfs;
        foreach ($data as $key => $value) {
        }
        $cfs = Cf::with('penyakit')->whereIn('id_gejala',$data)->get();

        return $this->sendResponse($cfs->toArray(), 'Cfs retrieved successfully');
    }

    /**
     * Store a newly created Cf in storage.
     * POST /cfs
     *
     * @param CreateCfAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCfAPIRequest $request)
    {
        $input = $request->all();

        $cfs = $this->cfRepository->create($input);

        return $this->sendResponse($cfs->toArray(), 'Cf saved successfully');
    }

    /**
     * Display the specified Cf.
     * GET|HEAD /cfs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cf $cf */
        $cf = $this->cfRepository->findWithoutFail($id);

        if (empty($cf)) {
            return $this->sendError('Cf not found');
        }

        return $this->sendResponse($cf->toArray(), 'Cf retrieved successfully');
    }

    /**
     * Update the specified Cf in storage.
     * PUT/PATCH /cfs/{id}
     *
     * @param  int $id
     * @param UpdateCfAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCfAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cf $cf */
        $cf = $this->cfRepository->findWithoutFail($id);

        if (empty($cf)) {
            return $this->sendError('Cf not found');
        }

        $cf = $this->cfRepository->update($input, $id);

        return $this->sendResponse($cf->toArray(), 'Cf updated successfully');
    }

    /**
     * Remove the specified Cf from storage.
     * DELETE /cfs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cf $cf */
        $cf = $this->cfRepository->findWithoutFail($id);

        if (empty($cf)) {
            return $this->sendError('Cf not found');
        }

        $cf->delete();

        return $this->sendResponse($id, 'Cf deleted successfully');
    }
}
