<?php 
namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAllLatest()
    {
        return $this->userRepo->getDefaultColumnsLatest();
    }

    public function getDataById($id)
    {
        $user = $this->userRepo->getById($id);
        if(!$user){
            abort(403, 'User not found by ID '.$id);
        }

        return $user;
    }

    public function createData($data)
    {
        return $this->userRepo->create($data);
    }

    public function updateData($data, $id)
    {
        $data = (object) $data;
        $user = $this->userRepo->getById($id);
        if(!$user){
            abort(403, 'User not found by ID '.$id);
        }

        if(!empty($data->password)){
            $data->password = Hash::make($data->password);
        } else{
            unset($data->password);
        }
        return $this->userRepo->update((array)$data, $id);
    }

    public function deleteData($id)
    {
        $user = $this->userRepo->getById($id);
        if(!$user){
            abort(403, 'User not found by ID '.$id);
        }

        return $this->userRepo->destroy($id);
    }
}


