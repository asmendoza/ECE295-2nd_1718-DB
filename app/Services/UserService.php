<?php

namespace App\Services;

use App\Exceptions\UsernameNotAvailableException;
use App\Exceptions\EmailNotAvailableException;
use App\Exceptions\NoAvailableUserException;
use App\Exceptions\UserDeleteFailedException;
use App\Exceptions\UserUpdateFailedException;
use App\Exceptions\UserCreateFailedException;
use App\Exceptions\UserInvalidException;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserService implements UserServiceInterface
{

    protected $userRepository;


    use RegistersUsers;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'username' => 'required|unique:users'
        ]);

        if($validator->fails()){
            $validateEmail = $validator->errors()->first('email');
            if(!empty($validateEmail)){
                throw New EmailNotAvailableException;
            }

            $validateUsername = $validator->errors()->first('username');
            if(!empty($validateUsername)){
                throw New UsernameNotAvailableException;
            }
        }


        $user = $this->userRepository->create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if(!$user){
            throw New UserCreateFailedException;
        }

        return $user;
        
    }

    public function getAllUser(Request $request)
    {
        $users = $this->userRepository->getAll();
 
        if(!$users){
            throw New NoAvailableUserException;
        }

        return $users;
        
    }

    public function getUser($id)
    {
        $user = $this->userRepository->getById($id);
 
        if(!$user){
            throw New UserInvalidException;
        }

        return $user;
    }

    public function updateUser($id, Request $request)
    {
        $user = $this->userRepository->update($id, [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        if(!$user){
            throw New UserUpdateFailedException;
        }

        return $user;   
    }

    public function deleteUser($id)
    {
        $user = $this->userRepository->delete($id);
        
        if(!$user){
            throw New UserDeleteFailedException;
        }

        return $user;
    }

    public function deleteUsers(Request $request)
    {
        if(isset($request->ids)){
            $ids = explode(',', $request->ids);
            foreach($ids as $id){
                $this->deleteUser($id);
            }
        }
    }


}
