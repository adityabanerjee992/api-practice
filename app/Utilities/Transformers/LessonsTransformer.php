<?php

namespace App\Utilities\Transformers;

class LessonsTransformer extends Transformer
{
	/**
	 * transform a single array object 
	 * @param  array $lesson 
	 * @return array        
	 */
    public function transform($lesson)
    {  
        return [
            'title'  => $lesson['title'],
            'body'   => $lesson['title'],
            'active' => (boolean) $lesson['active'],
        ];
    }
}