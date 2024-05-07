<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_uuid',
        'volumes',
        'carrier_uuid',
        'sender_id',
        'tracking_id',
        'recipient_id'
    ];
}
