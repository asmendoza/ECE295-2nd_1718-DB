<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\Users;

class UsersRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $model;

    public function __construct(Users $user)
    {
        parent::__construct($user);
        $this->model = $user;
    }

    public function getAll()
    {
        return $this->model::with('profile')->get();
    }

    public function getById($id)
    {
        return $this->model->with('profile')->findOrfail($id);
    }

}