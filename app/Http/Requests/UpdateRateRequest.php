<?php

namespace App\Http\Requests;

use App\Rules\AvailableAuction;
use App\Rules\LowestPrice;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'auction' => [
                'bail',
                'required',
                'integer',
                'exists:auction,id',
                new AvailableAuction(),
            ],
            'value' => [
                'required',
                'numeric',
                new LowestPrice($this->auction)
            ]
        ];
    }
}