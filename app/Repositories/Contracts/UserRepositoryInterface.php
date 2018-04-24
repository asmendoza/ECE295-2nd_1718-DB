<?php
namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface extends RepositoryInterface
{

    public function getAll();

    public function getById($id);

}