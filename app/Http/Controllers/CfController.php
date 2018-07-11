<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCfRequest;
use App\Http\Requests\UpdateCfRequest;
use App\Repositories\CfRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CfController extends AppBaseController
{
    /** @var  CfRepository */
    private $cfRepository;

    public function __construct(CfRepository $cfRepo)
    {
        $this->cfRepository = $cfRepo;
    }

    /**
     * Display a listing of the Cf.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cfRepository->pushCriteria(new RequestCriteria($request));
        $cfs = $this->cfRepository->all();

        return view('cfs.index')
            ->with('cfs', $cfs);
    }

    /**
     * Show the form for creating a new Cf.
     *
     * @return Response
     */
    public function create()
    {
        return view('cfs.create');
    }

    /**
     * Store a newly created Cf in storage.
     *
     * @param CreateCfRequest $request
     *
     * @return Response
     */
    public function store(CreateCfRequest $request)
    {
        $input = $request->all();

        $cf = $this->cfRepository->create($input);

        Flash::success('Cf saved successfully.');

        return redirect(route('cfs.index'));
    }

    /**
     * Display the specified Cf.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cf = $this->cfRepository->findWithoutFail($id);

        if (empty($cf)) {
            Flash::error('Cf not found');

            return redirect(route('cfs.index'));
        }

        return view('cfs.show')->with('cf', $cf);
    }

    /**
     * Show the form for editing the specified Cf.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cf = $this->cfRepository->findWithoutFail($id);

        if (empty($cf)) {
            Flash::error('Cf not found');

            return redirect(route('cfs.index'));
        }

        return view('cfs.edit')->with('cf', $cf);
    }

    /**
     * Update the specified Cf in storage.
     *
     * @param  int              $id
     * @param UpdateCfRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCfRequest $request)
    {
        $cf = $this->cfRepository->findWithoutFail($id);

        if (empty($cf)) {
            Flash::error('Cf not found');

            return redirect(route('cfs.index'));
        }

        $cf = $this->cfRepository->update($request->all(), $id);

        Flash::success('Cf updated successfully.');

        return redirect(route('cfs.index'));
    }

    /**
     * Remove the specified Cf from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cf = $this->cfRepository->findWithoutFail($id);

        if (empty($cf)) {
            Flash::error('Cf not found');

            return redirect(route('cfs.index'));
        }

        $this->cfRepository->delete($id);

        Flash::success('Cf deleted successfully.');

        return redirect(route('cfs.index'));
    }
}
