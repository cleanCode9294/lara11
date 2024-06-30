<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

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
}
