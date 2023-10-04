<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct()
    {
    
    }

    public function createUser(Request $request) {
        $data = $request->all();

        $user = new User();
        $user->first_name = $data['firstName'];
        $user->last_name = $data['lastName'];
        $user->phone_number = $data['phoneNumber'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        try {
            DB::beginTransaction();
            
            $user->save();

            DB::commit();
        } catch(\Throwable $throwable) {
            DB::rollback();
            report($throwable);
            throw $throwable;
        }
        return $user;
    }
}
