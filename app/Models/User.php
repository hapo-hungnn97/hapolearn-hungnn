<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;

class User extends Authenticatable
{
    use Notifiable,
        SoftDeletes;

    const GENDER = [
        'male' => 1,
        'female' => 2,
    ];

    const GENDER_LABEL = [
        'male' => 'Male',
        'female' => 'Female',
    ];

    const ROLE = [
        'user' => 1,
        'teacher' => 2,
    ];

    const ROLE_LABEL = [
        'user' => 'User',
        'teacher' => 'Teacher',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'phone_number', 'address', 'avatar', 'role', 'birthday', 'description'
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

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function getGenderLabelAttribute()
    {
        return self::GENDER_LABEL[array_flip(self::GENDER)[$this->gender]];
    }

    public function getIsTeacherAttribute()
    {
        return $this->role == self::ROLE['teacher'];
    }

    public function getRoleLabelAttribute()
    {
        return self::ROLE_LABEL[array_flip(self::ROLE)[$this->role]];
    }
}
