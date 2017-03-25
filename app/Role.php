<?php

namespace App;

use App\People;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function people()
    {
        return $this->belongsToMany(People::class)->withTimestamps();
    }
}
