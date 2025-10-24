<?php

namespace App\Interfaces;

use App\Http\Requests\GetUserRequest;

interface UserRepositoryInterface
{
    // Repository methods for User model
    public function getUsers(GetUserRequest $getUserRequest);
    public function ping();
}
