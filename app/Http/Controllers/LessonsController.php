<?php

namespace App\Http\Controllers;

use Response;
use Validator;
use App\Lesson;
use Illuminate\Http\Request;
use App\Utilities\Transformers\LessonsTransformer;

class LessonsController extends ApiController
{   
    /**
     * @var App\Utilities\Transformers\LessonsTransformer
     */
    protected $lessonTransformer;


    public function __construct(LessonsTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $lessons = Lesson::all();

        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
        ]);

    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body'  => 'required'
        ]);

        if($validator->fails()){
            return $this->respondValidationError($validator->errors()->all());
        }

        Lesson::create($request->all());

        return $this->respondLessonCreated('lesson created');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        
        if(!$lesson) {
            return $this->respondNotFound('lesson not found');   
        }

        return $this->respond([
            'data' => $this->lessonTransformer->transform($lesson)
        ]); 
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
