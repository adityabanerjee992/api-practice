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
     * @var 
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
}
