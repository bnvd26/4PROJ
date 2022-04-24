<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gradebook extends Model
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

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function results()
    {
        return $this->hasMany(GradebookResult::class);
    }
}
