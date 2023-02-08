<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasFactory, softDeletes;

    protected $append = ['fullName'];

    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' .$this->last_name;
    }

    public function setPasswordAttribute($value) 
    {
        $this->attributes['password'] =  bcrypt($value);
    }
}
