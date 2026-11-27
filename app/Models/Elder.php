<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['user_id', 'name', 'age', 'health_condition', 'photo'])]
class Elder extends Model
{
    protected function casts(): array
    {
        return [
            'age' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function controls(): HasMany
    {
        return $this->hasMany(Control::class);
    }

    public function medications(): HasMany
    {
        return $this->hasMany(Medication::class);
    }
}
