<?php

namespace App;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use ThrottlesLogins;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role', 
        'locale', 
        'provider', 
        'provider_id',
        'api_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];

    public function hasRole(string $role)
    {
        return $role === $this->role;
    }

    public function dashboardUrl() {
        return '/' . $this->role;
    }

    public function accountUrl() {
        return '/' . $this->role . '/account';
    }
}
