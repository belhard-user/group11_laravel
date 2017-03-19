<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function test()
    {
        return $this->belongsTo(\App\Test::class); // foo_id
    }
}
