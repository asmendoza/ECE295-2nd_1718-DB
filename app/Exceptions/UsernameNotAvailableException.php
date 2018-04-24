<?php
namespace App\Exceptions;

use Exception;

class UsernameNotAvailableException extends Exception
{
    protected $message = 'Username Already in use!';
}