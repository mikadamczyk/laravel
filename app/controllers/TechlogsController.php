<?php

class TechlogsController extends BaseController {

    /**
     * Techlog Repository
     *
     * @var Techlog
     */
    protected $techlog;

    public function __construct(Techlog $techlog)
    {
        $this->techlog = $techlog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $techlogs = $this->techlog->all();
        // CACHE SORTING INPUTS
        $allowed = array('user_id', 'device_id', 'type_id'); // add allowable columns to search on
        $sort = in_array(Input::get('sort'), $allowed) ? Input::get('sort') : 'id'; // if user type in the url a column that doesnt exist app will default to id
        $order = Input::get('order') === 'asc' ? 'asc' : 'desc'; // default desc        
        
        $techlogs = Techlog::orderBy($sort, $order)
            ->with('user')
            ->with('device')
            ->with('type')
        ;
        
        // FILTERS
        $user_id = null;
        $device_id = null;
        $type_id = null;
        
        if (Input::has('user_id')) {
            $techlogs = $techlogs->where('user_id', Input::get('user_id'));
            $user_id = '&user_id='.Input::get('user_id');
        }
        if (Input::has('device_id')) {
            $techlogs = $techlogs->where('device_id', Input::get('device_id'));
            $device_id = '&device_id='.Input::get('device_id');
        }
        if (Input::has('type_id')) {
            $techlogs = $techlogs->where('type_id', Input::get('type_id'));
            $type_id = '&type_id='.Input::get('type_id');
        }
        
        // PAGINATION
        $techlogs = $techlogs->paginate(5);

        $users = User::lists('real_name', 'id');
        $devices = Device::lists('name', 'id');
        $types = Type::lists('name', 'id');
        
        $pagination = $techlogs->appends(
                array(
                    'user_id'   => Input::get('user_id'),
                    'device_id' => Input::get('device_id'),
                    'type_id'   => Input::get('type_id'),
                    'sort'      => Input::get('sort'),
                    'order'     => Input::get('order')
                ))->links();
        
        $querystr = '&order='.(Input::get('order') == 'asc' || null ? 'desc' : 'asc').$user_id.$device_id.$type_id;
        
        return View::make('techlogs.index', compact(
            'techlogs',
            'pagination',
            'users',
            'devices',
            'types',
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
        $users = array('' => 'Please Select User') + User::lists('real_name', 'id');
        $devices = array('' => 'Please Select Device') + Device::lists('name', 'id');
        $types = array('' => 'Please Select Type') + Type::lists('name', 'id');
        return View::make('techlogs.create', compact('users', 'devices', 'types' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Techlog::$rules);

        if ($validation->passes())
        {
            $this->techlog->create($input);

            return Redirect::route('techlogs.index');
        }

        return Redirect::route('techlogs.create')
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
        $techlog = $this->techlog->findOrFail($id);

        return View::make('techlogs.show', compact('techlog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $techlog = $this->techlog->find($id);
        $users = array('' => 'Please Select User') + User::lists('real_name', 'id');
        $devices = array('' => 'Please Select Device') + Device::lists('name', 'id');
        $types = array('' => 'Please Select Type') + Type::lists('name', 'id');
        if (is_null($techlog))
        {
            return Redirect::route('techlogs.index');
        }

        return View::make('techlogs.edit', compact('techlog', 'users', 'devices', 'types'));
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
        $validation = Validator::make($input, Techlog::$rules);

        if ($validation->passes())
        {
            $techlog = $this->techlog->find($id);
            $techlog->update($input);

            return Redirect::route('techlogs.show', $id);
        }

        return Redirect::route('techlogs.edit', $id)
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
        $this->techlog->find($id)->delete();

        return Redirect::route('techlogs.index');
    }

}