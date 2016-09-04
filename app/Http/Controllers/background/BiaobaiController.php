<?php

namespace App\Http\Controllers\Background;

use App\Http\Requests\Background;
use App\Http\Requests\Background\CreateBiaobaiRequest;
use App\Http\Requests\Background\UpdateBiaobaiRequest;
use App\Repositories\Background\BiaobaiRepository;
use App\Http\Controllers\Controller as LaravelController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BiaobaiController extends LaravelController
{
    /** @var  BiaobaiRepository */
    private $biaobaiRepository;

    public function __construct(BiaobaiRepository $biaobaiRepo)
    {
        $this->biaobaiRepository = $biaobaiRepo;
    }

    /**
     * Display a listing of the Biaobai.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->biaobaiRepository->pushCriteria(new RequestCriteria($request));
        $biaobais = $this->biaobaiRepository->all();

        return view('background.biaobais.index')
            ->with('biaobais', $biaobais);
    }

    /**
     * Show the form for creating a new Biaobai.
     *
     * @return Response
     */
    public function create()
    {
        return view('background.biaobais.create');
    }

    /**
     * Store a newly created Biaobai in storage.
     *
     * @param CreateBiaobaiRequest $request
     *
     * @return Response
     */
    public function store(CreateBiaobaiRequest $request)
    {
        $input = $request->all();

        $biaobai = $this->biaobaiRepository->create($input);

        Flash::success('Biaobai saved successfully.');

        return redirect(route('background.biaobais.index'));
    }

    /**
     * Display the specified Biaobai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $biaobai = $this->biaobaiRepository->findWithoutFail($id);

        if (empty($biaobai)) {
            Flash::error('Biaobai not found');

            return redirect(route('background.biaobais.index'));
        }

        return view('background.biaobais.show')->with('biaobai', $biaobai);
    }

    /**
     * Show the form for editing the specified Biaobai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $biaobai = $this->biaobaiRepository->findWithoutFail($id);

        if (empty($biaobai)) {
            Flash::error('Biaobai not found');

            return redirect(route('background.biaobais.index'));
        }

        return view('background.biaobais.edit')->with('biaobai', $biaobai);
    }

    /**
     * Update the specified Biaobai in storage.
     *
     * @param  int              $id
     * @param UpdateBiaobaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBiaobaiRequest $request)
    {
        $biaobai = $this->biaobaiRepository->findWithoutFail($id);

        if (empty($biaobai)) {
            Flash::error('Biaobai not found');

            return redirect(route('background.biaobais.index'));
        }

        $biaobai = $this->biaobaiRepository->update($request->all(), $id);

        Flash::success('Biaobai updated successfully.');

        return redirect(route('background.biaobais.index'));
    }

    /**
     * Remove the specified Biaobai from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $biaobai = $this->biaobaiRepository->findWithoutFail($id);

        if (empty($biaobai)) {
            Flash::error('Biaobai not found');

            return redirect(route('background.biaobais.index'));
        }

        $this->biaobaiRepository->delete($id);

        Flash::success('Biaobai deleted successfully.');

        return redirect(route('background.biaobais.index'));
    }
}
