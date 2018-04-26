<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UsersRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $model;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->model = $user;
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getById($id)
    {
        return $this->model->findOrfail($id);
    }

}