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
        // CACHE SORTING INPUTS
        $allowed = array('user_id', 'object_id', 'program_id'); // add allowable columns to search on
        $sort = in_array(Input::get('sort'), $allowed) ? Input::get('sort') : 'id'; // if user type in the url a column that doesnt exist app will default to id
        $order = Input::get('order') === 'asc' ? 'asc' : 'desc'; // default desc

        $obslogs = Obslog::orderBy($sort, $order)->with('filter')
        ->with('object')
        ->with('user')
        ->with('program');

        // FILTERS
        $user_id = null;
        $object_id = null;
        $program_id = null;

        if (Input::has('user_id')) {
            $obslogs = $obslogs->where('user_id', Input::get('user_id'));
            $user_id = '&user_id='.Input::get('user_id');
        }
        if (Input::has('object_id')) {
            $obslogs = $obslogs->where('object_id', Input::get('object_id'));
            $object_id = '&object_id='.Input::get('object_id');
        }
        if (Input::has('program_id')) {
            $obslogs = $obslogs->where('program_id', Input::get('program_id'));
            $program_id = '&program_id='.Input::get('program_id');
        }

        $users = User::lists('real_name', 'id');
        $objects = Object::lists('name', 'id');
        $programs = Program::lists('name', 'id');

        // PAGINATION
        $obslogs = $obslogs->paginate(10);

        $pagination = $obslogs->appends(
                array(
//                         'game_id'       => Input::get('game_id'),
//                         'server_id' => Input::get('server_id'),
//                         'sort'      => Input::get('sort'),
//                         'order'     => Input::get('order')
                ))->links();

        $querystr = '&order='.(Input::get('order') == 'asc' || null ? 'desc' : 'asc').$user_id.$object_id.$program_id;

        return View::make('obslogs.index', compact(
            'obslogs',
            'pagination',
            'users',
            'objects',
            'programs',
            'querystr'
        ));
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
        $users = User::orderBy('real_name', 'asc')->lists('real_name', 'id');
        $conditions = Condition::orderBy('name', 'asc')->lists('name', 'id');
        $flats = Flat::orderBy('name', 'asc')->lists('name', 'id');
        $autoguiders = Autoguider::orderBy('name', 'asc')->lists('name', 'id');
        $ares = array_combine(Obslog::$ares, Obslog::$ares);
        return View::make('obslogs.create', compact(
                'objects', 
                'programs', 
                'telescopes', 
                'detectors', 
                'filters', 
                'users', 
                'conditions',
                'flats',
                'autoguiders',
                'ares'
                ));
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
        $users = User::orderBy('real_name', 'asc')->lists('real_name', 'id');
        $conditions = Condition::orderBy('name', 'asc')->lists('name', 'id');
        $flats = Flat::orderBy('name', 'asc')->lists('name', 'id');
        $autoguiders = Autoguider::orderBy('name', 'asc')->lists('name', 'id');
        if (is_null($obslog))
        {
            return Redirect::route('obslogs.index');
        }

        return View::make('obslogs.edit', compact(
                'obslog', 
                'objects', 
                'programs', 
                'telescopes', 
                'detectors', 
                'filters', 
                'users', 
                'conditions',
                'flats',
                'autoguiders'
                ));
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