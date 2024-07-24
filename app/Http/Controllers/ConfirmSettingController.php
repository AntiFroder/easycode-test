<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmCodeRequest;
use App\Services\ConfirmSettings\ConfirmSettingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConfirmSettingController extends Controller
{
    public function confirmCode(ConfirmCodeRequest $request, ConfirmSettingService $service): JsonResponse
    {
        $validated = $request->validated();
        return response()->json($service->confirmCode($validated));
    }
}
