<?php

namespace App\Models;

use App\Notifications\CustomVerifyEmailNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Log;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'number',
        'password',
        'role',
        'email_verified_at'

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function hasVerifiedEmail()
    {
        return $this->email_verified_at !== null;
    }

    public function teacherProfile()
    {
        return $this->hasOne(TeacherProfile::class);
    }

    public function parentProfile()
    {
        return $this->hasOne(ParentProfile::class);
    }

    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    public function isParent()
    {
        return $this->role === 'parent';
    }


    /**
     * Get the email address that should be used for verification.
     *
     * @return string
     */


    public function debugVerificationDetails()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'getKey' => method_exists($this, 'getKey') ? $this->getKey() : 'Method not exists',
            'exists_in_db' => $this->exists,
            'was_recently_created' => $this->wasRecentlyCreated
        ];
    }
    public function getKey()
    {
        return $this->id;
    }

    public function getKeyName()
    {
        return 'id';
    }

    public function sendEmailVerificationNotification()
    {
        Log::info('Sending Verification Notification', [
            'user_id' => $this->id,
            'email' => $this->email
        ]);

        $this->notify(new \App\Notifications\CustomVerifyEmailNotification());
    }

    public function getEmailForVerification()
    {
        return $this->email;
    }
    public function markEmailAsVerified()
{
    return $this->forceFill([
        'email_verified_at' => $this->freshTimestamp()
    ])->save();
}

}
