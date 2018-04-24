<?php
namespace App\Exceptions;

use Exception;

class UserCreateFailedException extends Exception
{
    protected $message = 'User Create Failed!';
}