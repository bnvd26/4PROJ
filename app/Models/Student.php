<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
