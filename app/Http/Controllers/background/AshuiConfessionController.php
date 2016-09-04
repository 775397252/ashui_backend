<?php

namespace App\Http\Controllers\Background;

use App\Http\Requests\Background;
use App\Http\Requests\Background\CreateAshuiConfessionRequest;
use App\Http\Requests\Background\UpdateAshuiConfessionRequest;
use App\Repositories\Background\AshuiConfessionRepository;
use App\Http\Controllers\Controller as LaravelController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AshuiConfessionController extends LaravelController
{
    /** @var  AshuiConfessionRepository */
    private $ashuiConfessionRepository;

    public function __construct(AshuiConfessionRepository $ashuiConfessionRepo)
    {
        $this->ashuiConfessionRepository = $ashuiConfessionRepo;
    }

    /**
     * Display a listing of the AshuiConfession.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ashuiConfessionRepository->pushCriteria(new RequestCriteria($request));
        $ashuiConfessions = $this->ashuiConfessionRepository->all();

        return view('background.ashuiConfessions.index')
            ->with('ashuiConfessions', $ashuiConfessions);
    }

    /**
     * Show the form for creating a new AshuiConfession.
     *
     * @return Response
     */
    public function create()
    {
        return view('background.ashuiConfessions.create');
    }

    /**
     * Store a newly created AshuiConfession in storage.
     *
     * @param CreateAshuiConfessionRequest $request
     *
     * @return Response
     */
    public function store(CreateAshuiConfessionRequest $request)
    {
        $input = $request->all();

        $ashuiConfession = $this->ashuiConfessionRepository->create($input);

        Flash::success('AshuiConfession saved successfully.');

        return redirect(route('background.ashuiConfessions.index'));
    }

    /**
     * Display the specified AshuiConfession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ashuiConfession = $this->ashuiConfessionRepository->findWithoutFail($id);

        if (empty($ashuiConfession)) {
            Flash::error('AshuiConfession not found');

            return redirect(route('background.ashuiConfessions.index'));
        }

        return view('background.ashuiConfessions.show')->with('ashuiConfession', $ashuiConfession);
    }

    /**
     * Show the form for editing the specified AshuiConfession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ashuiConfession = $this->ashuiConfessionRepository->findWithoutFail($id);

        if (empty($ashuiConfession)) {
            Flash::error('AshuiConfession not found');

            return redirect(route('background.ashuiConfessions.index'));
        }

        return view('background.ashuiConfessions.edit')->with('ashuiConfession', $ashuiConfession);
    }

    /**
     * Update the specified AshuiConfession in storage.
     *
     * @param  int              $id
     * @param UpdateAshuiConfessionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAshuiConfessionRequest $request)
    {
        $ashuiConfession = $this->ashuiConfessionRepository->findWithoutFail($id);

        if (empty($ashuiConfession)) {
            Flash::error('AshuiConfession not found');

            return redirect(route('background.ashuiConfessions.index'));
        }

        $ashuiConfession = $this->ashuiConfessionRepository->update($request->all(), $id);

        Flash::success('AshuiConfession updated successfully.');

        return redirect(route('background.ashuiConfessions.index'));
    }

    /**
     * Remove the specified AshuiConfession from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ashuiConfession = $this->ashuiConfessionRepository->findWithoutFail($id);

        if (empty($ashuiConfession)) {
            Flash::error('AshuiConfession not found');

            return redirect(route('background.ashuiConfessions.index'));
        }

        $this->ashuiConfessionRepository->delete($id);

        Flash::success('AshuiConfession deleted successfully.');

        return redirect(route('background.ashuiConfessions.index'));
    }
}
