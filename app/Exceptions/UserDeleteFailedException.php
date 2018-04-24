<?php
namespace App\Exceptions;

use Exception;

class UserDeleteFailedException extends Exception
{
    protected $message = 'User Delete Failed!';
}