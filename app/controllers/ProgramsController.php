<?php

class ProgramsController extends BaseController {

    /**
     * Program Repository
     *
     * @var Program
     */
    protected $program;

    public function __construct(Program $program)
    {
        $this->program = $program;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $programs = $this->program->all();

        return View::make('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Program::$rules);

        if ($validation->passes())
        {
            $this->program->create($input);

            return Redirect::route('programs.index');
        }

        return Redirect::route('programs.create')
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
        $program = $this->program->findOrFail($id);

        return View::make('programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $program = $this->program->find($id);

        if (is_null($program))
        {
            return Redirect::route('programs.index');
        }

        return View::make('programs.edit', compact('program'));
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
        $validation = Validator::make($input, Program::$rules);

        if ($validation->passes())
        {
            $program = $this->program->find($id);
            $program->update($input);

            return Redirect::route('programs.show', $id);
        }

        return Redirect::route('programs.edit', $id)
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
        $this->program->find($id)->delete();

        return Redirect::route('programs.index');
    }

}