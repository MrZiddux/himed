<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function __construct()
    {
        $this->User = new User();
    }

    public function createData($payload)
    {
        return $this->User->create($payload);
    }

    public function allUser()
    {
        return $this->User->getDataUser();
    }

    public function deleteUser($id)
    {
        return $this->User->deleteUser($id);
    }

    public function roleCheck()
    {
        dd(Auth::user());
    }
}
