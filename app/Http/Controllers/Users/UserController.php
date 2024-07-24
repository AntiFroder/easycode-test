<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmCodeRequest;
use App\Http\Requests\SendConfirmCodeRequest;
use App\Models\User;
use App\Services\ConfirmSettings\ConfirmSettingService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function sendConfirmCode(
        SendConfirmCodeRequest $request,
        ConfirmSettingService $service
    ): JsonResponse {
        $validated = $request->validated();
        return response()->json($service->sendNotification($validated));
    }
}
