@extends('layouts.app')

@section('content')
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            <div class="col-xl-12 mb-5 mb-xl-0">
                <h1>{{ $subject->name }}</h1>
                <h2>Intervenants</h2>
                @php
                    use App\Models\Student;
                    $student = Student::where(['user_id' => Auth::user()->id])->first();
                @endphp
                @foreach ($subject->professors as $professor)
                    <p>Intervenant : <strong>{{ $professor->last_name }} {{ $professor->first_name }} - {{ $professor->campuses->first()->location }}</strong></p>
                @endforeach

                @foreach ($subject->exams as $exam)
                    {{ $student->gradebooks->first()->results->where('subject_id', $exam->subject_id)->first()->passed }}

                    @if ($exam->activated &&
                        $student->gradebooks->first()->results->where('subject_id', $exam->subject_id)->first()->passed)
                        @foreach ($exam->questions as $question)
                            <p>{{ $question->question }}</p>
                            <ul>
                                @foreach ($question->answers as $key => $answer)
                                    <li class="{{ $answer->truth == 1 ? 'alert alert-success' : '' }}">
                                        {{ $key + 1 . '.' . $answer->answer }}</li>
                                @endforeach
                            </ul>
                        @endforeach
                    @elseif($exam->activated &&
                        !$student->gradebooks->first()->results->where('subject_id', $exam->subject_id)->first()->passed)
                        <a href="{{ route('questions.show', ['exam_id' => $exam->id, 'exam_question' => $exam->questions->first()->id]) }}"
                            class="btn btn-primary">Commencer l'examen</a>
                    @endif
                @endforeach
                </table>
                {!! $subject->course !!}
            </div>
        </div>
    </div>
    </div>
@endsection
