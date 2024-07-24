<?php

declare(strict_types=1);

namespace App\Services\ConfirmSettings\Strategy;


use App\Models\ConfirmSetting;
use App\Services\ConfirmSettings\Strategy\Interfaces\SendCodeInterface;
use App\Models\User;
class TelegramService implements SendCodeInterface
{

    public static function sendCode(array $validated): ConfirmSetting
    {
        return ConfirmSetting::create($validated);
    }
}
