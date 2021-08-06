<?php

namespace App\Models;

use App\Pct\AppConfig;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
	    'maiden_name',
	    'birthdate',
	    'user_type',
        'email',
        'password',
        'mobile_phone',
        'office_phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate'=> 'datetime'
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    const ROLE=['Utilisateur'=>1,"Admin"=>2,"Super admin"=>3];
    public function user(){
        return $this->hasOne(Agent::class,'id');
    }
    public function isAdmin(){
        if($this->isSuperAdmin()) return true;
        return $this->user_type==2;
    }
    public function isSuperAdmin(){
        return $this->user_type==3;
    }
    public function isUser(){
        return $this->user_type==1;
    }
    public function role(){
        return array_search($this->attributes['user_type'],self::ROLE);
    }
    public static function getUserType():int
    {
        $res = AppConfig::isFirstUser()?3: 1;
        return $res;
    }
}
