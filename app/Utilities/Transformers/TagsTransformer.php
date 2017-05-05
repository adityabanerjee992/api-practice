<?php

namespace App\Utilities\Transformers;

class TagsTransformer extends Transformer
{
	/**
	 * transform a single array object 
	 * @param  array $tag 
	 * @return array        
	 */
    public function transform($tag)
    {  
        return [
            'name'  => $tag['name']
        ];
    }
}