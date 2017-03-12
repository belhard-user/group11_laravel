<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test';
    
    protected $fillable = ['name', 'email', 'age'];

    public function getPrintInfoAttribute()
    {
        return sprintf('%s @ %s', $this->age, $this->email);
    }

    public function scopePeopleH($builder, $word='h')
    {
        return $builder->where('name', 'like', $word.'%')->orWhere('email', 'like', $word.'%');
    }

    public function getAvgAge()
    {
        return $this->avg('age');
    }
}
