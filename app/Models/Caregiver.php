<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'service_type', 'experience', 'languages', 'service_area', 'certification', 'photo', 'rating', 'review_count'])]
class Caregiver extends Model
{
    protected function casts(): array
    {
        return [
            'rating' => 'decimal:1',
            'review_count' => 'integer',
        ];
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
