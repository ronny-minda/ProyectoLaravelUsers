<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Roles;
use App\Models\DatosExtra;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'users', 'roles_id');
    }

    public function datos_extras()
    {
        return $this->belongsTo(DatosExtra::class, 'datos_extras_id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'email',
        'password',
        'fecha_nacimiento',
        'direccion_domicilio',
        'telefono_movil',
        'estado_vacunacion',
        'roles_id',
        'datos_extras_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
