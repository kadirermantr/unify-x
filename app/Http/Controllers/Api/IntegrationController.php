<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\AuthService;
use App\Domain\Services\IntegrationService;
use App\Http\Controllers\Controller;
use App\Http\Requests\IntegrationStoreRequest;
use App\Models\Integration;
use Illuminate\Http\JsonResponse;

class IntegrationController extends Controller
{
    public function __construct(
        protected AuthService $authService,
        protected IntegrationService $integrationService,
    ) {
    }

    public function store(IntegrationStoreRequest $request): JsonResponse
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username && $password) {
            if (! $this->authService->authenticate($username, $password)) {
                return response()->json([
                    'error' => 'Email or password is wrong',
                ], 401);
            }
        }

        $data = $request->validated();
        $integration = $this->integrationService->create($data);

        return response()->json([
            'message' => 'Integration saved',
            'data' => $integration,
        ], 201);
    }

    public function update(IntegrationStoreRequest $request, Integration $integration): JsonResponse
    {
        $this->integrationService->update($integration, $request->validated());

        return response()->json([
            'message' => 'Integration updated',
        ]);
    }

    public function destroy(Integration $integration): JsonResponse
    {
        $this->integrationService->delete($integration);

        return response()->json([
            'message' => 'Integration deleted',
        ]);
    }
}
