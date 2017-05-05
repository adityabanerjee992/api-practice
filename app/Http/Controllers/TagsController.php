<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Lesson;
use Illuminate\Http\Request;
use App\Utilities\Transformers\TagsTransformer;

class TagsController extends ApiController
{   
    /**
     * App\Utilities\Transformers\TagsTransformer
     * @var [type]
     */
    protected $tagsTransformer;

    /**
     * 
     * @param TagsTransformer $tagsTransformer 
     */
    function __construct(TagsTransformer $tagsTransformer)
    {
        $this->tagsTransformer = $tagsTransformer;
    }   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {  
        $tags = ($id) ? Lesson::findOrFail($id)->tags : Tag::all();

        return $this->respond([
            'data' => $this->tagsTransformer->transformCollection($tags->all())
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {   
        return $this->respond([
            'data' => $this->tagsTransformer->transform($tag)
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
