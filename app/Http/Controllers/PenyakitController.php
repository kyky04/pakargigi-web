<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenyakitRequest;
use App\Http\Requests\UpdatePenyakitRequest;
use App\Repositories\PenyakitRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PenyakitController extends AppBaseController
{
    /** @var  PenyakitRepository */
    private $penyakitRepository;

    public function __construct(PenyakitRepository $penyakitRepo)
    {
        $this->penyakitRepository = $penyakitRepo;
    }

    /**
     * Display a listing of the Penyakit.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->penyakitRepository->pushCriteria(new RequestCriteria($request));
        $penyakits = $this->penyakitRepository->all();

        return view('penyakits.index')
            ->with('penyakits', $penyakits);
    }

    /**
     * Show the form for creating a new Penyakit.
     *
     * @return Response
     */
    public function create()
    {
        return view('penyakits.create');
    }

    /**
     * Store a newly created Penyakit in storage.
     *
     * @param CreatePenyakitRequest $request
     *
     * @return Response
     */
    public function store(CreatePenyakitRequest $request)
    {
        $input = $request->all();   
        $penyakit = $this->penyakitRepository->create($input);

        Flash::success('Penyakit saved successfully.');

        return redirect(route('penyakits.index'));
    }

    /**
     * Display the specified Penyakit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penyakit = $this->penyakitRepository->findWithoutFail($id);

        if (empty($penyakit)) {
            Flash::error('Penyakit not found');

            return redirect(route('penyakits.index'));
        }

        return view('penyakits.show')->with('penyakit', $penyakit);
    }

    /**
     * Show the form for editing the specified Penyakit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penyakit = $this->penyakitRepository->findWithoutFail($id);

        if (empty($penyakit)) {
            Flash::error('Penyakit not found');

            return redirect(route('penyakits.index'));
        }

        return view('penyakits.edit')->with('penyakit', $penyakit);
    }

    /**
     * Update the specified Penyakit in storage.
     *
     * @param  int              $id
     * @param UpdatePenyakitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenyakitRequest $request)
    {
        $penyakit = $this->penyakitRepository->findWithoutFail($id);

        if (empty($penyakit)) {
            Flash::error('Penyakit not found');

            return redirect(route('penyakits.index'));
        }

        $penyakit = $this->penyakitRepository->update($request->all(), $id);

        Flash::success('Penyakit updated successfully.');

        return redirect(route('penyakits.index'));
    }

    /**
     * Remove the specified Penyakit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penyakit = $this->penyakitRepository->findWithoutFail($id);

        if (empty($penyakit)) {
            Flash::error('Penyakit not found');

            return redirect(route('penyakits.index'));
        }

        $this->penyakitRepository->delete($id);

        Flash::success('Penyakit deleted successfully.');

        return redirect(route('penyakits.index'));
    }
}
