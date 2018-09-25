<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 25.09.2018
 * Time: 13:24
 */

namespace App\Http\Requests;

use App\Rules\SingleOrderCreation;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'required|integer|exists:user,id',
            'offer_id' => [
                'required',
                'integer',
                'exists:offer,id',
                new SingleOrderCreation($this->customer_id),
            ],
        ];
    }
}