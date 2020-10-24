<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Services\UserService;
use App\Traits\ResponseAPI;
Use Exception;


class UserApiController extends Controller
{
    use ResponseAPI;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        try{
            $users = $this->userService->getAllLatest();

        } catch(Exception $e){
            $check = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;
            return $this->errorResponse($e->getMessage(), $check);
        } 
        
        return $this->successResponse("All Users", $users);
    }

    public function store(CreateUserRequest $request)
    {
        try{
            $user = $this->userService->createData($request->validated());

        } catch(Exception $e){
            $check = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;
            return $this->errorResponse($e->getMessage(), $check);
        } 

        return $this->successResponse("User has been Created", $user);
    }

    public function show($id)
    {
        try{
            $user = $this->userService->getDataById($id);

        } catch(Exception $e){
            $check = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;
            return $this->errorResponse($e->getMessage(), $check);
        } 

        return $this->successResponse("Show User detail", $user);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try{
            $user = $this->userService->updateData($request->validated(), $id);

        } catch(Exception $e){
            $check = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;
            return $this->errorResponse($e->getMessage(), $check);
        } 

        return $this->successResponse("User has been Updated", $user);
    }

    public function destroy($id)
    {
        try{
            $user = $this->userService->deleteData($id);

        } catch(Exception $e){
            $check = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;
            return $this->errorResponse($e->getMessage(), $check);
        } 

        return $this->successResponse("User has been Removed", $user);
    }

    
}