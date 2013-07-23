<?php

class AutoguidersController extends BaseController {

    /**
     * Autoguider Repository
     *
     * @var Autoguider
     */
    protected $autoguider;

    public function __construct(Autoguider $autoguider)
    {
        $this->autoguider = $autoguider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $autoguiders = $this->autoguider->all();

        return View::make('autoguiders.index', compact('autoguiders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('autoguiders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Autoguider::$rules);

        if ($validation->passes())
        {
            $input['hidden'] = (isset($input['hidden'])) ? $input['hidden'] : '0';
            $input['deleted'] = (isset($input['deleted'])) ? $input['deleted'] : '0';

            $this->autoguider->create($input);

            return Redirect::route('autoguiders.index');
        }

        return Redirect::route('autoguiders.create')
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
        $autoguider = $this->autoguider->findOrFail($id);

        return View::make('autoguiders.show', compact('autoguider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $autoguider = $this->autoguider->find($id);

        if (is_null($autoguider))
        {
            return Redirect::route('autoguiders.index');
        }

        return View::make('autoguiders.edit', compact('autoguider'));
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
        $validation = Validator::make($input, Autoguider::$rules);

        if ($validation->passes())
        {
            $autoguider = $this->autoguider->find($id);
            $input['hidden'] = (isset($input['hidden'])) ? $input['hidden'] : '0';
            $input['deleted'] = (isset($input['deleted'])) ? $input['deleted'] : '0';
            $autoguider->update($input);

            return Redirect::route('autoguiders.show', $id);
        }

        return Redirect::route('autoguiders.edit', $id)
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
        $this->autoguider->find($id)->delete();

        return Redirect::route('autoguiders.index');
    }

}