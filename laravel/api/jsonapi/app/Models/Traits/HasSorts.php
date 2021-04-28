<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait HasSorts
{
    public function scopeApplySorts(Builder $query, $sort)
    {
        if (!property_exists($this, 'allowedSorts')) {
            abort(500, 'Please set the public property $allowedSorts inside '.get_class($this));
        }
        if (is_null($sort)) {
            return;
        }

        $sortFields = Str::of($sort)->explode(',');

        foreach ($sortFields as $sortField) {
            # code...
            $direction = 'asc';
            if (Str::of($sortField)->startsWith('-')) {
                $direction = 'desc';
                $sortField = Str::of($sortField)->substr(1);
            }
            if (!collect($this->allowedSorts)->contains($sortField)) {
                abort(400);
            }
            $query->orderBy($sortField, $direction);
        }
    }
}
