<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    protected $appends = ['first_name'];

    /**
     * Determine if the user is an administrator.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function getFirstNameAttribute()
    {
        return Auth::user()->type == 'student' ? Student::find(Auth::user()->id)->user->first_name : '';
    }

    /**
     * Determine if the user is an administrator.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function getLastNameAttribute()
    {
        return Auth::user()->type == 'student' ? Student::find(Auth::user()->id)->user->last_name : '';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->promotion->subjects();
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }

    public function gradebooks()
    {
        return $this->hasMany(Gradebook::class);
    }
}
