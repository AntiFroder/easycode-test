<?php

namespace App\Observers;

use App\Models\ConfirmSetting;

class ConfirmSettingObserver
{
    public function creating(ConfirmSetting $confirmSetting): void
    {
        $confirmSetting->confirm_code = rand(1000, 9999);
    }
}
