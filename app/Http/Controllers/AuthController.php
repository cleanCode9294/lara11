<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\UserRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $service
    )
    {
    }

    /**
     * @param UserRequest $request
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function register(UserRequest $request): JsonResponse
    {
        $data = $this->service->register($request->getDTO());

        return response()->json(['success' => true, 'data' => $data]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6'
        ]);

        $response = $this->service->login(new UserDTO(
            email: $request->get('email'),
            password: $request->get('password')
        ));

        if ($response['success']) {
            return response()->json($response);
        }

        return response()->json($response, Response::HTTP_UNAUTHORIZED);
    }
}
