<?php

namespace App\Models;

use App\Core\Cacheable;
use App\Notifications\{ResetPasswordNotification, VerifyEmail};
use Illuminate\Database\Eloquent\{Builder, Relations\HasMany};
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Cacheable, Notifiable;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleted(function($user) {
            $user->loads->each->delete();
        });
    }

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
        'email_verified_at',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'maxLoad',
    ];

    /**
     * @return HasMany
     */
    public function loads() : HasMany
    {
        return $this->hasMany(Load::class)->orderBy('clear', 'desc');
    }

    /**
     * @param string $password
     */
    public function setPasswordAttribute(string $password = null) : void
    {
        $this->attributes['password'] = $password ?Hash::make($password) : $this->password;
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

    /**
     * @return string
     */
    public function getMaxLoadAttribute()
    {
        return $this->loads->first();
    }
}
