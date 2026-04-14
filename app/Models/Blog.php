<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
