<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';


    public function permisos()
    {
        return $this->belongsToMany(Permisos::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function profile()
    {
        return $this->hasOne(User::class);
    }
}
