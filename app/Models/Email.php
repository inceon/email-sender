<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';

    public function users() {
        return $this->belongsToMany(User::class, 'users__emails');
    }
}
