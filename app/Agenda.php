<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Agenda extends Authenticatable implements JWTSubject
{
    protected $fillable = ['asunto', 'fecha', 'hora', 'estados'];
    
    public function getJWTIdentifier()
    {
    	return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
    	return [];
    
    }
}
