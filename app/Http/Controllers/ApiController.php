<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    /**
     * status code property
     * @var 
     */
    protected $statusCode = 200;


    /**
     * get the status code property 
     * @return $statusCode       
     */
    public function getStatusCode()
    {
    	return $this->statusCode;
    }


    /**
     * set the status code property
     * @param $statusCode 
     */
    public function setStatusCode($statusCode)
    {
    	$this->statusCode = $statusCode;

        return $this;
    }


    /**
     * when there is a 404 error
     * @param  string $message 
     * @return json          
     */
    public function respondNotFound($message='Not Found!')
    {   
        return $this->setStatusCode(404)->respondWithError($message);
    }


    /**
     * when there is a 500 error
     * @param  string $message 
     * @return json          
     */
    public function respondInternalError($message='Internal Error!')
    {   
        return $this->setStatusCode(500)->respondWithError($message);
    }


    /**
     * respond to return json for apis
     * @param  array $data  
     * @param  array  $headers 
     * @return json 
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }


    /**
     * respond with the error
     * @param  string $message 
     * @return array 
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }


    /**
     * respond after validating errors
     * @param  string $message 
     * @return json          
     */
    public function respondValidationError($message)
    {
        return $this->setStatusCode(422)->respondWithError($message);
    }


    /**
     * respond after a lesson is created
     * @param  string $message 
     * @return json          
     */
    public function respondLessonCreated($message)
    {
        return $this->setStatusCode(201)->respond(['message' => $message]);
    }
}
