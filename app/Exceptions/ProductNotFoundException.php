<?php

namespace App\Exceptions;

use Exception;
use Log;

class ProductNotFoundException extends Exception
{
    public function __construct($message = "Product not found", $code = 404)
    {
        // Pass the message and code to the base Exception class
        parent::__construct($message, $code);
    }

    public function report() {
        Log::error($this->message);
    }
    
    // // You can also customize the render method if you want to return a specific view or response
    public function render($request)
    {
        // You can customize the response here (for example, return a view or a JSON response)
        return response()->view('errors.notfound', ['message' => $this->message], $this->code);
    }

}
