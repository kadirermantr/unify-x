<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\IntegrationService;
use App\Http\Controllers\Controller;
use App\Http\Requests\IntegrationStoreRequest;
use App\Models\Integration;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class IntegrationController extends Controller
{
    public function __construct(protected IntegrationService $service)
    {
    }

    public function store(IntegrationStoreRequest $request): JsonResponse
    {
        if (! $this->authenticate($request->input('username'), $request->input('password'))) {
            return response()->json([
                'error' => 'Email or password is wrong',
            ], 401);
        }

        $data = $request->validated();
        $integration = $this->service->create($data);

        return response()->json([
            'message' => 'Integration saved',
            'data' => $integration,
        ], 201);
    }

    public function update(IntegrationStoreRequest $request, Integration $integration): JsonResponse
    {
        $this->service->update($integration, $request->validated());

        return response()->json([
            'message' => 'Integration updated',
        ]);
    }

    public function destroy(Integration $integration): JsonResponse
    {
        $this->service->delete($integration);

        return response()->json([
            'message' => 'Integration deleted',
        ]);
    }

    private function authenticate($username, $password): bool
    {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        return Auth::attempt($credentials);
    }
}
