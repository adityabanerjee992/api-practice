<?php

namespace App\Utilities\Transformers;

abstract class Transformer 
{	
	/**
	 * transform the collection result
	 * @param  collection $lessons 
	 * @return array          
	 */
	public function transformCollection(array $items)
    {   
        return array_map([$this, 'transform'], $items);
    }	


    /**
     * tranform a single object item
     * @param  array $item 
     * @return array       
     */
    abstract function transform($item);
}