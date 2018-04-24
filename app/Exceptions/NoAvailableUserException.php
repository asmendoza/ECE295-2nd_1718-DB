<?php
namespace App\Exceptions;

use Exception;

class NoAvailableUserException extends Exception
{
    protected $message = 'No Available User';
}