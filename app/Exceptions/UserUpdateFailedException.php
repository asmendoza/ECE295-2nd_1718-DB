<?php
namespace App\Exceptions;

use Exception;

class UserUpdateFailedException extends Exception
{
    protected $message = 'User Update Failed!';
}