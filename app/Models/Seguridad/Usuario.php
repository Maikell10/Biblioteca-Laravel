<?php

namespace App\Models\Seguridad;

use App\models\Admin\Rol;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'usuario';
    protected $fillable = ['usuario', 'nombre', 'email', 'password'];

    public function roles(){
        return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    public function setSession($roles){

        Session::put([
            'usuario' => $this->usuario,
            'usuario_id' => $this->id,
            'nombre_usuario' => $this->nombre
        ]);
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                    
                ]
            );
        }else{
            Session::put('roles', $roles);
        }
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }
}
