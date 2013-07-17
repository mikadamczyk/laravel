<?php

class ConditionsController extends BaseController {

    /**
     * Condition Repository
     *
     * @var Condition
     */
    protected $condition;

    public function __construct(Condition $condition)
    {
        $this->condition = $condition;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $conditions = $this->condition->all();

        return View::make('conditions.index', compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Condition::$rules);

        if ($validation->passes())
        {
            $input['hidden'] = (isset($input['hidden'])) ? $input['hidden'] : '0';
            $input['deleted'] = (isset($input['deleted'])) ? $input['deleted'] : '0';

            $this->condition->create($input);

            return Redirect::route('conditions.index');
        }

        return Redirect::route('conditions.create')
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
        $condition = $this->condition->findOrFail($id);

        return View::make('conditions.show', compact('condition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $condition = $this->condition->find($id);

        if (is_null($condition))
        {
            return Redirect::route('conditions.index');
        }

        return View::make('conditions.edit', compact('condition'));
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
        $validation = Validator::make($input, Condition::$rules);

        if ($validation->passes())
        {
            $condition = $this->condition->find($id);
            $input['hidden'] = (isset($input['hidden'])) ? $input['hidden'] : '0';
            $input['deleted'] = (isset($input['deleted'])) ? $input['deleted'] : '0';
            $condition->update($input);

            return Redirect::route('conditions.show', $id);
        }

        return Redirect::route('conditions.edit', $id)
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
        $this->condition->find($id)->delete();

        return Redirect::route('conditions.index');
    }

}