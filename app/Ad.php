<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title', 'description', 'localisation', 'price'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
