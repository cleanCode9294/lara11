<?php

namespace App\Services\Auth;

use App\DTO\UserDTO;
use App\Models\User;
use App\Repositories\User\IUserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthService implements IAuthService
{
    public function __construct(
        protected IUserRepository $repository
    )
    {
    }

    /**
     * @param UserDTO $authDTO
     * @return array|JsonResponse
     */
    public function login(UserDTO $authDTO): array|JsonResponse
    {
        if (Auth::attempt(['email' => $authDTO->email, 'password' => $authDTO->password])) {

            /** @var User $user */

            $user = Auth::user();

            $token = $user->createToken('appToken')->plainTextToken;

            return ['success' => true, 'token' => $token];

        } else {

            return [
                'success' => false,
                'message' => 'Failed to authenticate.',
            ];
        }
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
