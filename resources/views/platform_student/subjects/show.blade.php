@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $subject->name }}</h1>
    <h2>Intervenants</h2>
    @php
    use App\Models\Student;
    $student = Student::where(['user_id' => Auth::user()->id])->first();
    @endphp
        @foreach ($subject->professors as $professor)
        <p>Intervenant : <strong>{{ $student->campus }}</strong></p>
        @endforeach

        @foreach ($subject->exams as $exam)
        {{$student->gradebooks->first()->results->where('subject_id', $exam->subject_id)->first()->passed}}

        @if($exam->activated && $student->gradebooks->first()->results->where('subject_id', $exam->subject_id)->first()->passed)
        @foreach ($exam->questions as $question)
                <p>{{ $question->question }}</p>
                <ul>
                @foreach ($question->answers as $key => $answer)
                    <li class="{{ $answer->truth == 1 ? "alert alert-success" : '' }}">{{ $key + 1 . '.' . $answer->answer }}</li>
                @endforeach
                </ul>
            @endforeach
        @elseif($exam->activated && !$student->gradebooks->first()->results->where('subject_id', $exam->subject_id)->first()->passed)
            <a href="{{ route('questions.show', ['exam_id' => $exam->id, 'exam_question' => $exam->questions->first()->id]) }}" class="btn btn-primary">Commencer l'examen</a>
        @endif
        @endforeach
      </table>
    {!! $subject->course !!}
</div>
@endsection
