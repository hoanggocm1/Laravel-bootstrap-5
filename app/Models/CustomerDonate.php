<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDonate extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'company',
        'email',
        'phone_number',
        'gender',
        'payment_mode',
        'card_number',
        'expiration',
        'cvn',
        'donate_us',
    ];
}
