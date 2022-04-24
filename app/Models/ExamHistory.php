<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamHistory extends Model
{

    protected $table = 'exams_history';

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

    public function answer()
    {
        return $this->hasOne(ExamQuestionAnswer::class, 'id', 'exam_question_answer_id');
    }

    public function question()
    {
        return $this->hasOne(ExamQuestion::class, 'id', 'exam_question_id');
    }
}
