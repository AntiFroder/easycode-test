<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'confirm_code',
        'setting_id',
        'user_id',
        'value',
        'type',
        'is_confirm'
    ];
}
