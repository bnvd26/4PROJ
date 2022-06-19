@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $subject->name }}</h1>
    <h2>Intervenants</h2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Campus</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($subject->professors as $professor)
                <tr onclick="window.location='{{ route('academic_subjects.show', ['academic_subject' => $subject->id]) }}';" style="cursor:pointer" class="tr-hover">
                    <th scope="row">{{ $professor->last_name }}</th>
                    <th scope="row">{{ $professor->first_name }}</th>
                    <th>
                        <ul>
                        @foreach ($professor->campuses as $campus)
                            <li>{{ $campus->location }}</li>
                        @endforeach
                        <ul>
                    </th>
                </tr>
            @endforeach
        </tbody>
      </table>
    {!! $subject->course !!}

    @foreach ($subject->exams as $exam)
            @foreach ($exam->questions as $question)
                <p>{{ $question->question }}</p>
                <ul>
                @foreach ($question->answers as $key => $answer)
                    <li class="{{ $answer->truth == 1 ? "alert alert-success" : '' }}">{{ $key + 1 . '.' . $answer->answer }}</li>
                @endforeach
                </ul>
            @endforeach
        @endforeach
</div>
@endsection
