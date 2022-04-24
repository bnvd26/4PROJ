<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradebookResult extends Model
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

    public function gradebook()
    {
        return $this->belongsTo(Gradebook::class);
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function exam()
    {
        return $this->hasOne(Exam::class, 'subject_id', 'subject_id');
    }
}
