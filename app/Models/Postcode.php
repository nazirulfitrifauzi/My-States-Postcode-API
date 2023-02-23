<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function states()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
