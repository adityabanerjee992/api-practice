<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonTag extends Model
{	
	/**
	 * table to use
	 * @var string
	 */
	protected $table = 'lesson_tag';


	/**
	 * mass assignment
	 * @var array
	 */
    protected $fillable = ['lesson_id', 'tag_id'];
}
