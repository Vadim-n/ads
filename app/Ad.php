<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title', 'text'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}