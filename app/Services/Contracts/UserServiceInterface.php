<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function createUser(Request $request);

    public function getAllUser(Request $request);

    public function getUser($id);

    public function updateUser($id, Request $request);

    public function deleteUser($id);

    public function deleteUsers(Request $request);

}
