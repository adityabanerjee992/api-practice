<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{	
	/**
	 * mass assignment
	 * @var array
	 */
    protected $fillable = ['title', 'body'];


    /**
     * a tag belongs to many lessons
     * @return collection 
     */
    public function tags()
    {
 		return $this->belongsToMany('App\Tag');   	
    }
}
