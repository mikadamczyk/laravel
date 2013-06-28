<?php

class ObslogsController extends BaseController {

    /**
     * Obslog Repository
     *
     * @var Obslog
     */
    protected $obslog;

    public function __construct(Obslog $obslog)
    {
        $this->obslog = $obslog;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//         $obslogs = $this->obslog->all();
        $obslogs = Obslog::with('filter')
        ->with('object')
        ->with('user')
        ->with('program')
        ->get();
        return View::make('obslogs.index', compact('obslogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $objects = Object::lists('name', 'id');
        $programs = Program::lists('name', 'id');
        $telescopes = Telescope::lists('name', 'id');
        $detectors = Detector::lists('name', 'id');
        $filters = Filter::lists('name', 'id');
        return View::make('obslogs.create', compact('objects', 'programs', 'telescopes', 'detectors', 'filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Obslog::$rules);

        if ($validation->passes())
        {
            $input['user_id'] = Auth::user()->id;
            $this->obslog->create($input);
            return Redirect::route('obslogs.index');
        }

        return Redirect::route('obslogs.create')
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
        $obslog = $this->obslog->findOrFail($id);

        return View::make('obslogs.show', compact('obslog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $obslog = $this->obslog->find($id);
        $objects = Object::lists('name', 'id');
        $programs = Program::lists('name', 'id');
        $telescopes = Telescope::lists('name', 'id');
        $detectors = Detector::lists('name', 'id');
        $filters = Filter::lists('name', 'id');
        if (is_null($obslog))
        {
            return Redirect::route('obslogs.index');
        }

        return View::make('obslogs.edit', compact('obslog', 'objects', 'programs', 'telescopes', 'detectors', 'filters'));
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
        $validation = Validator::make($input, Obslog::$rules);

        if ($validation->passes())
        {
            $obslog = $this->obslog->find($id);
            $obslog->update($input);

            return Redirect::route('obslogs.show', $id);
        }

        return Redirect::route('obslogs.edit', $id)
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
        $this->obslog->find($id)->delete();

        return Redirect::route('obslogs.index');
    }

}