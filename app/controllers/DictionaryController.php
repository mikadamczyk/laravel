<?php

class DictionaryController extends BaseController {

    /**
     * Dictionary Repository
     *
     * @var Dictionary
     */
//    protected $autoguider;

//    public function __construct(Autoguider $autoguider)
//    {
//        $this->autoguider = $autoguider;
//    }

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
    
    public function toogle($id, $objectType)
    {
        $allowed = array('autoguider');
        if(in_array($objectType, $allowed)){
            $objectType = ucfirst($objectType);
            $object = $objectType::find($id);
            $object->update(array('hidden'=>!$object->hidden));
            return Response::json(array( 'message'=>'success!', 'actual'=> !$object->hidden));
        }else{
            return Response::json(array( 'message'=>'Niedozwolony obiekt!', 'actual'=> !$object->hidden));
        }
    }



    
}