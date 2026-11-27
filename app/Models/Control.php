<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['elder_id', 'control_date', 'place', 'is_done'])]
class Control extends Model
{
    protected function casts(): array
    {
        return [
            'control_date' => 'date',
            'is_done' => 'boolean',
        ];
    }

    public function elder(): BelongsTo
    {
        return $this->belongsTo(Elder::class);
    }
}
