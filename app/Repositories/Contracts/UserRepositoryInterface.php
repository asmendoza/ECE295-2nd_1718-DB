<?php
namespace App\Repositories\Contracts;

use App\User;

interface UserRepositoryInterface extends RepositoryInterface
{

    public function getAll();

    public function getById($id);

}