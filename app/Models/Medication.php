<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['elder_id', 'name', 'dosage', 'period', 'time', 'last_taken_date'])]
class Medication extends Model
{
    protected function casts(): array
    {
        return [
            'last_taken_date' => 'date',
        ];
    }

    public function elder(): BelongsTo
    {
        return $this->belongsTo(Elder::class);
    }
}
