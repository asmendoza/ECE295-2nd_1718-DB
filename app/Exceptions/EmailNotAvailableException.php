<?php
namespace App\Exceptions;

use Exception;

class EmailNotAvailableException extends Exception
{
    protected $message = 'Email is not available!';
}