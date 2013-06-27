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
        $techlogs = $this->techlog->all();

        return View::make('techlogs.index', compact('techlogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('techlogs.create');
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

        if (is_null($techlog))
        {
            return Redirect::route('techlogs.index');
        }

        return View::make('techlogs.edit', compact('techlog'));
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