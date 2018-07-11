<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGejalaRequest;
use App\Http\Requests\UpdateGejalaRequest;
use App\Repositories\GejalaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GejalaController extends AppBaseController
{
    /** @var  GejalaRepository */
    private $gejalaRepository;

    public function __construct(GejalaRepository $gejalaRepo)
    {
        $this->gejalaRepository = $gejalaRepo;
    }

    /**
     * Display a listing of the Gejala.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->gejalaRepository->pushCriteria(new RequestCriteria($request));
        $gejalas = $this->gejalaRepository->all();

        return view('gejalas.index')
            ->with('gejalas', $gejalas);
    }

    /**
     * Show the form for creating a new Gejala.
     *
     * @return Response
     */
    public function create()
    {
        return view('gejalas.create');
    }

    /**
     * Store a newly created Gejala in storage.
     *
     * @param CreateGejalaRequest $request
     *
     * @return Response
     */
    public function store(CreateGejalaRequest $request)
    {
        $input = $request->all();

        $gejala = $this->gejalaRepository->create($input);

        Flash::success('Gejala saved successfully.');

        return redirect(route('gejalas.index'));
    }

    /**
     * Display the specified Gejala.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gejala = $this->gejalaRepository->findWithoutFail($id);

        if (empty($gejala)) {
            Flash::error('Gejala not found');

            return redirect(route('gejalas.index'));
        }

        return view('gejalas.show')->with('gejala', $gejala);
    }

    /**
     * Show the form for editing the specified Gejala.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gejala = $this->gejalaRepository->findWithoutFail($id);

        if (empty($gejala)) {
            Flash::error('Gejala not found');

            return redirect(route('gejalas.index'));
        }

        return view('gejalas.edit')->with('gejala', $gejala);
    }

    /**
     * Update the specified Gejala in storage.
     *
     * @param  int              $id
     * @param UpdateGejalaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGejalaRequest $request)
    {
        $gejala = $this->gejalaRepository->findWithoutFail($id);

        if (empty($gejala)) {
            Flash::error('Gejala not found');

            return redirect(route('gejalas.index'));
        }

        $gejala = $this->gejalaRepository->update($request->all(), $id);

        Flash::success('Gejala updated successfully.');

        return redirect(route('gejalas.index'));
    }

    /**
     * Remove the specified Gejala from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gejala = $this->gejalaRepository->findWithoutFail($id);

        if (empty($gejala)) {
            Flash::error('Gejala not found');

            return redirect(route('gejalas.index'));
        }

        $this->gejalaRepository->delete($id);

        Flash::success('Gejala deleted successfully.');

        return redirect(route('gejalas.index'));
    }
}
