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
}
