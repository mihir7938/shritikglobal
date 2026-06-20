<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use App\Services\UploadImageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $role_id = Role::ADMIN_ROLE_ID;
    private $imageService;

    public function __construct(
        UploadImageService $imageService
    )
    {
        $this->imageService = $imageService;
    }

    public function create($request)
    {
        return DB::transaction(function () use ($request) {
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->role_id = $request->type;
            $lastFourDigits = substr($request->phone, -4);
            if($request->type == 2) {
                $username = "SGTC".$lastFourDigits;
            } else if($request->type == 3) {
                $username = "SGAS".$lastFourDigits;
            } else if($request->type == 4) {
                $username = "SGCO".$lastFourDigits;
            }
            if (User::where('username', $username)->exists()) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'phone' => ['This phone number generates a username that already exists.'],
                ]);
            }
            $user->username = $username;
            $user->password = Hash::make($lastFourDigits);
            $user->canAccessSecure = $request->has('secure') ? 1 : 0;
            $user->canAccessUnSecure = $request->has('unsecure') ? 1 : 0;
            $user->status = $request->active;
            $user->save();
            return $user;
        });
    }
    public function getUserById($id)
    {
        return User::find($id);
    }
    public function update($user, $data)
    {
        return $user->update($data);
    }
    public function delete($user)
    {
        return $user->delete($user);
    }
    public function getAllUsers($per_page = -1)
    {
        if($per_page == -1){
            return User::orderBy('created_at', 'desc')->get();    
        }
        return User::orderBy('created_at', 'desc')->paginate($per_page);
    }
    public function getUsersByFilter($request)
    {
        $filter_query = User::orderBy('created_at','desc');
        if($request->has('status') && $request->status != ''){
            $filter_query = $filter_query->where('status', $request->status);
        }
        if($request->has('type') && $request->type != ''){
            $filter_query = $filter_query->where('role_id', $request->type);
        }
        return $filter_query->select('*')->get();
    }
    public function getUsersByRole($role_id)
    {
        $query = User::orderBy('created_at','desc')->where('status', 1);
        if($role_id && $role_id != ''){
            $query = $query->where('role_id', $role_id);
        }
        return $query->select('*')->get();
    }
}
