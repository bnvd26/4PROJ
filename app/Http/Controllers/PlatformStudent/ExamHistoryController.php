<?php

namespace App\Http\Controllers\PlatformStudent;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamHistory;
use App\Models\ExamQuestion;
use App\Models\GradebookResult;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ExamHistoryController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Subject  $subject
    *
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request, $exam_id, $exam_question)
    {
        $question = ExamQuestion::find($exam_question);

        ExamHistory::create([
            'student_id' => Student::where('user_id', Auth::user()->id)->first()->id,
            'exam_question_id' => $exam_question,
            'exam_question_answer_id' => $request->answer,
            'exam_id' => $exam_id
        ]);

        if(ExamQuestion::find($exam_question + 1)->exam_id != $exam_id) {
            $exam = Exam::find($exam_id);
            // $redirect = 'resume';
            // TODO Evant & Listener


            $gradebook = Student::where('user_id', Auth::user()->id)->first()->gradebooks->first();
            $gradebook_result = $gradebook->results->where('subject_id', $exam->subject->id)->first();

            $exam_historic = ExamHistory::where([
                'student_id' => Student::where('user_id', Auth::user()->id)->first()->id,
                'exam_id' => $exam_id
            ])->get();

            $final_result = 0;

            foreach($exam_historic as $historic) {
                $historic->answer->truth ? $final_result = $final_result + 20 : '';
            }

            $gradebook_result->update([
                'result' => $final_result,
                'passed' => $final_result > 50 ? true : false
            ]);

            return redirect()->route('exam_history.show', ['exam_id' => $exam_id]);
        } else {
            $exam_question++;
            // $redirect = 'questions.show';
            return redirect()->route('questions.show', ['exam_id' => $exam_id, 'exam_question' => $exam_question]);
        }

        return redirect()->route('questions.show', ['exam_id' => $exam_id, 'exam_question' => $exam_question]);
    }

    public function show($id)
    {
        $exam = Exam::find($id);

        $gradebook = Student::where('user_id', Auth::user()->id)->first()->gradebooks->first();
        $gradebook_result = $gradebook->results->where('subject_id', $exam->subject->id)->first();

        $exam_historic = ExamHistory::where([
            'student_id' => Student::where('user_id', Auth::user()->id)->first()->id,
            'exam_id' => $id
        ])->get();

        return view('platform_student.exam_history.show', compact('exam_historic', 'exam', 'gradebook_result'));
    }
}
