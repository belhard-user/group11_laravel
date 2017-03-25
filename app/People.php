<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['name'];

    public $table = 'peoples';

    public $timestamps = false;

    public function role()
    {
        return $this->belongsToMany(\App\Role::class)->withTimestamps();
    }
}
