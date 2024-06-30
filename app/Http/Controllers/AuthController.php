<?php

namespace App\Http\Controllers;

use App\DTO\AuthDTO;
use App\DTO\UserDTO;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $service
    )
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|unique:users,email|email|string',
            'password' => 'required|min:6'
        ]);

        $token = $this->service->register(new UserDTO(
            name: $request->get('name'),
            email: $request->get('email'),
            password: $request->get('password')
        ));

        return response()->json(['token' => $token]);
    }
}
