<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'elder_id', 'caregiver_id', 'booking_date', 'start_time', 'end_time', 'status'])]
class Booking extends Model
{
    protected function casts(): array
    {
        return [
            'booking_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function elder(): BelongsTo
    {
        return $this->belongsTo(Elder::class);
    }

    public function caregiver(): BelongsTo
    {
        return $this->belongsTo(Caregiver::class);
    }
}
