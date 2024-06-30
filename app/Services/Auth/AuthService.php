<?php

namespace App\Services\Auth;

use App\DTO\UserDTO;
use App\Models\User;
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

    /**
     * @param UserDTO $authDTO
     * @return array
     */
    public function register(UserDTO $authDTO): array
    {
        /** @var User $user */
        $user = $this->repository->create($authDTO->toArray());

        $token = $user->createToken('appToken')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function getCurrentUser()
    {
        // TODO: Implement getCurrentUser() method.
    }
}
