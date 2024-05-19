<?php

namespace App\Models;

use App\Services\StripeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $appends = ['card_detail'];

    public function getCardDetailAttribute()
    {
        $StripeService = resolve(StripeService::class);
        return $StripeService->retrieve_card($this->payment_method_customer_id);
    }
}
