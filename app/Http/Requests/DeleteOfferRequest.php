<?php

namespace App\Http\Requests;

use App\Rules\MyOffer;
use Illuminate\Foundation\Http\FormRequest;

class DeleteOfferRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => [
                'required',
                'integer',
                'exists:offer,id',
                new MyOffer()
            ]
        ];
    }
}