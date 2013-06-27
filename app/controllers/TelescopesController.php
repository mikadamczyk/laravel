<?php

class TelescopesController extends BaseController {

    /**
     * Telescope Repository
     *
     * @var Telescope
     */
    protected $telescope;

    public function __construct(Telescope $telescope)
    {
        $this->telescope = $telescope;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $telescopes = $this->telescope->all();

        return View::make('telescopes.index', compact('telescopes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('telescopes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Telescope::$rules);

        if ($validation->passes())
        {
            $this->telescope->create($input);

            return Redirect::route('telescopes.index');
        }

        return Redirect::route('telescopes.create')
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
        $telescope = $this->telescope->findOrFail($id);

        return View::make('telescopes.show', compact('telescope'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $telescope = $this->telescope->find($id);

        if (is_null($telescope))
        {
            return Redirect::route('telescopes.index');
        }

        return View::make('telescopes.edit', compact('telescope'));
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
        $validation = Validator::make($input, Telescope::$rules);

        if ($validation->passes())
        {
            $telescope = $this->telescope->find($id);
            $telescope->update($input);

            return Redirect::route('telescopes.show', $id);
        }

        return Redirect::route('telescopes.edit', $id)
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
        $this->telescope->find($id)->delete();

        return Redirect::route('telescopes.index');
    }

}