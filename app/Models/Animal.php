<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $guarded = [];

    use HasFactory;

    /**
     * @var mixed
     */
    private string $name;
    /**
     * @var mixed
     */
    private int $age;

    private string $color;

    private $race_id;

    private $weight;

    /*public function races()
    {
        return $this->belongsTo(Race::class);
    }*/
}
