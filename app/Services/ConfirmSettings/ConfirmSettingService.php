<?php

declare(strict_types=1);

namespace App\Services\ConfirmSettings;

use App\Enums\ServiceTypeEnum;
use App\Exceptions\WrongCodeException;
use App\Models\ConfirmSetting;
use App\Models\Setting;
use App\Models\User;
use App\Services\ConfirmSettings\Strategy\EmailService;
use App\Services\ConfirmSettings\Strategy\SmsService;
use App\Services\ConfirmSettings\Strategy\TelegramService;
use Illuminate\Http\JsonResponse;

class ConfirmSettingService
{
    public function sendNotification(array $validated): array
    {
        $confirmSetting = match ($validated['type']) {
            ServiceTypeEnum::SMS => SmsService::sendCode($validated),
            ServiceTypeEnum::EMAIL => EmailService::sendCode($validated),
            ServiceTypeEnum::TELEGRAM => TelegramService::sendCode($validated),
        };
        return [
            'confirm_setting_id' => $confirmSetting->id
        ];
    }

    public function confirmCode(array $validated): array
    {
        try {
            $confirmSetting = ConfirmSetting::find($validated['confirm_setting_id']);
            if ($confirmSetting->confirm_code !== (int)$validated['confirm_code']) {
                throw new WrongCodeException('Введен некорректный код');
            }
            $confirmSetting->update(['is_confirm' => true]);
            Setting::query()
                ->where('id', $confirmSetting->setting_id)
                ->update(['value' => $confirmSetting->value]);
            return [
                'status' => 'success'
            ];
        } catch (WrongCodeException $exception) {
            return [
                'message' => $exception->getMessage()
            ];
        }
    }
}
