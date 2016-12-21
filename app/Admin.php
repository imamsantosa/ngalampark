<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    public static function Authentication($creds)
    {
        $data = Admin::where('username', $creds['username'])->first();
        if($data == null)
            return false;

        if($data->comparePassword($creds['password'])){
            auth()->login($data);
            return true;
        }

        return false;
    }

    protected $table = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'fullname', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comparePassword($password){
        return Hash::check($password, $this->password);
    }
}