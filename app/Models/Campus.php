<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
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

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'campus_promotions');
    }

    public function professors()
    {
        return $this->belongsToMany(Professor::class, 'campus_professors');
    }

    public function students()
    {
        $students = [];

        foreach($this->promotions as $promotion) {
            $students[] = $promotion->students;
        }

        $stu = [];

        foreach($students as $collection_student) {
            foreach($collection_student as $student) {
                $stu[] = $student;
            }
        }

        return $stu;
    }

}
