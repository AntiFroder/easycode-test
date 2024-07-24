<?php

declare(strict_types=1);

namespace App\Services\ConfirmSettings\Strategy\Interfaces;

use App\Models\User;

interface SendCodeInterface
{
    public static function sendCode(array $validated);
}
