<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        $expireTime = Carbon::parse(Carbon::now()->addWeek())->toDateTimeString();

        return [
            'token' => $this->createToken('login')->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => $expireTime,
            'success' => 'Login successfully',
        ];
    }
}
