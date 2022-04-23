<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Subject extends Model
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

    public function professors()
    {
        return $this->hasMany(Professor::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    /**
     * Get professor of subject of the current student connected.
     *
     * @return void
     */
    public function current_professor()
    {
        foreach($this->professors() as $professor) {
            dump($professor);
        }

        return $this->professors();
    }
}
