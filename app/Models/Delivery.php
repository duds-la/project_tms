<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function carrier() : BelongsTo
    {
        return $this->belongsTo(Carrier::class, 'carrier_uuid', 'uuid');
    }

    public function sender() : BelongsTo
    {
        return $this->belongsTo(Sender::class, 'sender_id');
    }

    public function recipient() : BelongsTo
    {
        return $this->belongsTo(Recipient::class, 'recipient_id');
    }

    public function tracking() : HasOne
    {
        return $this->hasOne(Tracking::class, 'id', 'tracking_id');
    }
}
