<?php

namespace App\Http\Requests;

use App\Enums\ServiceTypeEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class SendConfirmCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['bail', 'required', new EnumValue(ServiceTypeEnum::class)],
            'setting_id' => 'bail|required|exists:settings,id',
            'user_id' => 'bail|required|exists:users,id',
            'value' => 'bail|required|string',
        ];
    }
}
