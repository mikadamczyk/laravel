<?php

class ObjectsController extends BaseController {

    /**
     * Object Repository
     *
     * @var Object
     */
    protected $object;

    public function __construct(Object $object)
    {
        $this->object = $object;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $objects = $this->object->all();

        return View::make('objects.index', compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('objects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Object::$rules);

        if ($validation->passes())
        {
            $this->object->create($input);

            return Redirect::route('objects.index');
        }

        return Redirect::route('objects.create')
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
        $object = $this->object->findOrFail($id);

        return View::make('objects.show', compact('object'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $object = $this->object->find($id);

        if (is_null($object))
        {
            return Redirect::route('objects.index');
        }

        return View::make('objects.edit', compact('object'));
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
        $validation = Validator::make($input, Object::$rules);

        if ($validation->passes())
        {
            $object = $this->object->find($id);
            $object->update($input);

            return Redirect::route('objects.show', $id);
        }

        return Redirect::route('objects.edit', $id)
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
        $this->object->find($id)->delete();

        return Redirect::route('objects.index');
    }

}