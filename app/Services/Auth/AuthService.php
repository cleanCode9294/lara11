<?php

namespace App\Services\Auth;

use App\DTO\UserDTO;
use App\Repositories\User\IUserRepository;

class AuthService implements IAuthService
{
    public function __construct(
        protected IUserRepository $repository
    )
    {
    }

    public function login(UserDTO $authDTO)
    {
        // TODO: Implement login() method.
    }

    public function logout()
    {
        // TODO: Implement logout() method.
    }

    public function register(UserDTO $authDTO)
    {
        return $this->repository->create($authDTO->toArray());
    }

    public function getCurrentUser()
    {
        // TODO: Implement getCurrentUser() method.
    }
}
