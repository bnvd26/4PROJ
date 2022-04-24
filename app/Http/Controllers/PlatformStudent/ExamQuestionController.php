<?php

namespace App\Http\Controllers\PlatformStudent;

use App\Http\Controllers\Controller;
use App\Models\ExamQuestion;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ExamQuestionController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Subject  $subject
    *
    * @return \Illuminate\Http\Response
    */
    public function show($exam_id, $exam_question)
    {
        $question = ExamQuestion::find($exam_question);

        return view('platform_student.exam.show', compact('question', 'exam_id', 'exam_question'));
    }
}
