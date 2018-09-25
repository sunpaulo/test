<?php

namespace App\Rules;

use App\Models\Order;
use Illuminate\Contracts\Validation\Rule;

class SingleOrderCreation implements Rule
{
    private $customer_id;

    public function __construct($userId)
    {
        $this->customer_id = $userId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Order::where('offer_id', $value)
            ->where('customer_id', $this->customer_id)
            ->doesntExist();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Access denied';
    }
}
