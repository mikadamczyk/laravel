<?php

class FlatsController extends BaseController {

    /**
     * Flat Repository
     *
     * @var Flat
     */
    protected $flat;

    public function __construct(Flat $flat)
    {
        $this->flat = $flat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $flats = $this->flat->all();

        return View::make('flats.index', compact('flats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('flats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Flat::$rules);

        if ($validation->passes())
        {
            $input['hidden'] = (isset($input['hidden'])) ? $input['hidden'] : '0';
            $input['deleted'] = (isset($input['deleted'])) ? $input['deleted'] : '0';

            $this->flat->create($input);

            return Redirect::route('flats.index');
        }

        return Redirect::route('flats.create')
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
        $flat = $this->flat->findOrFail($id);

        return View::make('flats.show', compact('flat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $flat = $this->flat->find($id);

        if (is_null($flat))
        {
            return Redirect::route('flats.index');
        }

        return View::make('flats.edit', compact('flat'));
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
        $validation = Validator::make($input, Flat::$rules);

        if ($validation->passes())
        {
            $flat = $this->flat->find($id);
            $input['hidden'] = (isset($input['hidden'])) ? $input['hidden'] : '0';
            $input['deleted'] = (isset($input['deleted'])) ? $input['deleted'] : '0';
            $flat->update($input);

            return Redirect::route('flats.show', $id);
        }

        return Redirect::route('flats.edit', $id)
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
        $this->flat->find($id)->delete();

        return Redirect::route('flats.index');
    }

}