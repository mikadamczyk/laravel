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
        $allowed = array('user_id', 'object_id', 'program_id', 'telescope_id'); // add allowable columns to search on
        $sort = in_array(Input::get('sort'), $allowed) ? Input::get('sort') : 'id'; // if user type in the url a column that doesnt exist app will default to id
        $order = Input::get('order') === 'asc' ? 'asc' : 'desc'; // default desc

        $obslogs = Obslog::orderBy($sort, $order)->with('filter')
        ->with('object')
        ->with('user')
        ->with('program')
        ->with('telescope');

        // FILTERS
        $user_id = null;
        $object_id = null;
        $program_id = null;
        $telescope_id = null;

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
        if (Input::has('telescope_id')) {
            $obslogs = $obslogs->where('telescope_id', Input::get('telescope_id'));
            $telescope_id = '&telescope_id='.Input::get('telescope_id');
        }

        $users = User::lists('real_name', 'id');
        $objects = Object::lists('name', 'id');
        $programs = Program::lists('name', 'id');
        $telescopes = Telescope::lists('name', 'id');

        // PAGINATION
        $obslogs = $obslogs->paginate(5);

        $pagination = $obslogs->appends(
                array(
                    'user_id'       => Input::get('user_id'),
                    'object_id' => Input::get('object_id'),
                    'program_id' => Input::get('program_id'),
                    'telescope_id' => Input::get('telescope_id'),
                    'sort'      => Input::get('sort'),
                    'order'     => Input::get('order')
                ))->links();

        $querystr = '&order='.(Input::get('order') == 'asc' || null ? 'desc' : 'asc').$user_id.$object_id.$program_id.$telescope_id;

        return View::make('obslogs.index', compact(
            'obslogs',
            'pagination',
            'users',
            'objects',
            'programs',
            'telescopes',
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
        $objects = array('' => 'Please Select Object') + Object::lists('name', 'id'); 
        $programs = array('' => 'Please Select Program') + Program::lists('name', 'id');
        $telescopes = array('' => 'Please Select Telescope') + Telescope::lists('name', 'id');
        $detectors = array('' => 'Please Select Detector') + Detector::lists('name', 'id');
        $filters = array('' => 'Please Select Filter') + Filter::lists('name', 'id');
        $users = array('' => 'Please Select User') + User::orderBy('real_name', 'asc')->lists('real_name', 'id');
        $conditions = array('' => 'Please Select Condition') + Condition::orderBy('name', 'asc')->lists('name', 'id');
        $flats = array('' => 'Please Select Flat') + Flat::orderBy('name', 'asc')->lists('name', 'id');
        $autoguiders = array('' => 'Please Select Autoguider') + Autoguider::orderBy('name', 'asc')->where('hidden',0)->lists('name', 'id');
        $ares = array('' => 'Please Select ARES') + array_combine(Obslog::$ares, Obslog::$ares);
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
            unset($input['hour']);
            unset($input['minute']);
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
//        ->with('object')
//        ->with('user')
//        ->with('program')
//        ->with('telescope')       
//        ;
//        $obslogs = Obslog::orderBy($sort, $order)->with('filter')
//        ->with('object')
//        ->with('user')
//        ->with('program')
//        ->with('telescope');

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
            unset($input['hour']);
            unset($input['minute']);
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