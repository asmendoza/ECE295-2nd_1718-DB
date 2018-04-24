<?php

namespace App\Http\Controllers;

use App\Exceptions\NoAvailableUserException;
use App\Exceptions\UserDeleteFailedException;
use App\Exceptions\UserUpdateFailedException;
use App\Exceptions\UserCreateFailedException;
use App\Exceptions\UserInvalidException;
use App\Exceptions\UsernameNotAvailableException;
use App\Exceptions\EmailNotAvailableException;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{

    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    Public function index()
    {
        return view('usermain');
    }

    public function getUsers(Request $request)
    {
        try{
            $users = $this->userService->getAllUser($request);
            return Response::json(['data' => $users], 200);
        } catch(\NoAvailableUserException $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        }
    }

    public function deleteUsers(Request $request)
    {
        try{
            $response = $this->userService->deleteUsers($request);
            return Response::json(['data' => $response], 200);
        } catch(\UserDeleteFailedException $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        }
    }

    public function getUserDetails($id)
    {
        try{
            $user = $this->userService->getUser($id);
            return Response::json([ 'data' => $user], 200);
        } catch(\NoAvailableUserException $e){
            Log::error($e->getMessage());
            return Response::json([ 'data' => [], 'msg' => $e->getMessage() ], 400);
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return Response::json([ 'data' => [], 'msg' => $e->getMessage() ], 400);
        }
    }

    public function addUser(Request $request)
    {
        try{
            $response = $this->userService->createUser($request);
            return Response::json(['data' => $response], 200);
        } catch(\UsernameNotAvailableException $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        } catch(\EmailNotAvailableException $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        } catch(\UserCreateFailedException $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        }
    }

    public function updateUser($id, Request $request)
    {
        try{
            $response = $this->userService->updateUser($id, $request);
            return Response::json(['data' => $response], 200);
        } catch(\UserUpdateFailedException $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        }
    }

    public function deleteUser($id)
    {
        try{
            $response = $this->userService->deleteUser($id);
            return Response::json([ 'data' => $response], 200);
        } catch(\UserDeleteFailedException $e){
            Log::error($e->getMessage());
            return Response::json(['data' => [], 'msg' => $e->getMessage() ], 400);
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return Response::json([ 'data' => [], 'msg' => $e->getMessage() ], 400);
        }
    }

}
