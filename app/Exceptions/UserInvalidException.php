<?php
namespace App\Exceptions;

use Exception;

class UserInvalidException extends Exception
{
    protected $message = 'Invalid User';
}