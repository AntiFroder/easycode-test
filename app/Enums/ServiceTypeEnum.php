<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ServiceTypeEnum extends Enum
{
    const SMS = 'sms';
    const EMAIL = 'email';
    const TELEGRAM = 'telegram';
}
