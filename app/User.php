<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;



    public function roleRedirect($user)
    {
        return Auth::user()->roles()->where('name',$user)->first();
    }

    public function roles()
    {
        return $this->belongsToMany('App\Roles','user_roles','user_id','role_id');
    }

    public function hasAnyRole($roles)
    {
      if (is_array($roles)) {
        foreach ($roles as $role) {
          if ($this->hasRole($role)) {
            return true;
          }
        }
      }
      else {
        if ($this->hasRole($roles)) {
          return true;
        }
      }
    }

    public function hasRole($role)
    {
      if ($this->roles()->where('name',$role)->first()){
        return true;
      }
      return false;
    }


    public function access()
    {
        return $this->belongsToMany('App\Roles','user_roles','user_id','role_id');
    }


    public function feeds()
    {
      return $this->hasMany("App\Feeds");
    }
    

    



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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
}
