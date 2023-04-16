<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paddock extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private string $name;
    /**
     * @var mixed
     */
    private mixed $size;
}
