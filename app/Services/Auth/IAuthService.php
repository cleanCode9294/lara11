<?php

namespace App\Services\Auth;

use App\DTO\UserDTO;

interface IAuthService
{
    public function login(UserDTO $authDTO);
    public function logout();
    public function register(UserDTO $authDTO);
    public function getCurrentUser();
}
