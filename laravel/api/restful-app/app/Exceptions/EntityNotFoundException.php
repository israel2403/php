<?php

namespace App\Exceptions;

use Exception;

class EntityNotFoundException extends Exception
{
    public function report()
    {

    }
    public function render($request)
    {
        return response();
    }
}
