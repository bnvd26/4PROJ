@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $subject->name }}</h1>
    <h2>Intervenants</h2>
    @php
    use App\Models\Student;
    @endphp
            @foreach ($subject->professors as $professor)



            <p>Intervenant : <strong>{{ Student::where(['user_id' => Auth::user()->id])->first()->campus }}</strong></p>
            @endforeach



        @foreach ($subject->exams as $exam)
        @if($exam->activated)
            @foreach ($exam->questions as $question)
                <p>{{ $question->question }}</p>
                <ul>
                @foreach ($question->answers as $key => $answer)
                    <li class="{{ $answer->truth == 1 ? "alert alert-success" : '' }}">{{ $key + 1 . '.' . $answer->answer }}</li>
                @endforeach
                </ul>
            @endforeach
        @endif
        @endforeach
      </table>
    {!! $subject->course !!}
</div>
@endsection
