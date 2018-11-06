<?php

namespace App\Models;

use App\Notifications\{ResetPasswordNotification, VerifyEmail};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'last_login',
        'updated_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_login',
    ];

    /**
     * @param string $password
     */
    public function setPasswordAttribute(string $password) : void
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification() : void
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token) : void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * @param Builder $builder
     * @param string  $email
     * @return Builder
     */
    public function scopeSocialUser(Builder $builder, string $email) : Builder
    {
        $builder = $builder->where('email', $email)->whereNull('password');

        return $this instanceof MustVerifyEmail
            ? $builder->whereNotNull('email_verified_at')
            : $builder;
    }

    /**
     * @return bool
     */
    public function isAdmin() : bool
    {
        foreach (config('auth.admin') as $column => $admin) if (in_array($this->$column, $admin)) return true;

        return false;
    }
}
