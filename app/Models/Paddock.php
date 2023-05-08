<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Paddock extends Model
{
    protected $guarded = [];

    use HasFactory;

    protected function name(): Attribute
    {
        return new Attribute(
            set: fn($value) => strtolower($value)
        );
    }
}
