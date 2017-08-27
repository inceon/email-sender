<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRoles() {
        $roles = array_map(function ($el){
            return $el->name;
        }, $this->roles()->get()->all());

        return implode(',', $roles);

    }

    public function delete() {
        $this->emails()->detach();
        $this->roles()->detach();

        return parent::delete();
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

    public function emails()
    {
        return $this->belongsToMany(Email::class, 'users__emails');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users__roles', 'user_id', 'role_id');
    }
}
