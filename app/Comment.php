<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name', 'text', 'mark'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
