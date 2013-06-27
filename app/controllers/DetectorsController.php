<?php

class DetectorsController extends BaseController {

    /**
     * Detector Repository
     *
     * @var Detector
     */
    protected $detector;

    public function __construct(Detector $detector)
    {
        $this->detector = $detector;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $detectors = $this->detector->all();

        return View::make('detectors.index', compact('detectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('detectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Detector::$rules);

        if ($validation->passes())
        {
            $this->detector->create($input);

            return Redirect::route('detectors.index');
        }

        return Redirect::route('detectors.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $detector = $this->detector->findOrFail($id);

        return View::make('detectors.show', compact('detector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $detector = $this->detector->find($id);

        if (is_null($detector))
        {
            return Redirect::route('detectors.index');
        }

        return View::make('detectors.edit', compact('detector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Detector::$rules);

        if ($validation->passes())
        {
            $detector = $this->detector->find($id);
            $detector->update($input);

            return Redirect::route('detectors.show', $id);
        }

        return Redirect::route('detectors.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->detector->find($id)->delete();

        return Redirect::route('detectors.index');
    }

}