@extends('layouts.app')

@section('content')

<h1>{{ $question->id }}</h1>
<form method="POST" action="{{ route('exam_history.store', ['exam_id' => $exam_id, 'exam_question' => $exam_question]) }}">
    @csrf

    <label>{{ $question->question }}</label>
    <select name="answer">
        @foreach ($question->answers as $answer)
            <option value="{{ $answer->id }}">{{ $answer->answer }}</option>
        @endforeach
    </select>
    <button type="submit">Envoyer</button>
</form>
</ul>
@endsection
