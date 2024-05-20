<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'property_id'
    ];

    public function  property() {
        return $this->belongsTo(Property::class);
    }
}
