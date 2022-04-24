@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Informations generales</h2>
        <p>Prénom : {{ $student->user->first_name }}</p>
        <p>Nom : {{ $student->user->last_name }}</p>

        <p>Alternance : {{ $student->internship ? 'Oui': 'Non' }}</p>
        @if ($student->internship)
        @foreach ($student->internships as $internship)
        <p>Date de début : {{ $internship->start_date }}</p>
        <p>Date de fin : {{ $internship->end_date }}</p>
        @endforeach
        @endif


        <h2>Matières suivies</h2>
        @foreach ($student->subjects as $subject)
            <p>{{ $subject->name }}</p>
        @endforeach

        <h2>Notes Obtenus</h2>
        @php
            $gradebook = $student->gradebooks->first();
        @endphp
        @foreach ($gradebook->results as $result)
            <p>Matière : {{ $result->subject->name }}</p>
            <p>Note obtenue : {{ $result->result }}</p>
        @endforeach
    </div>
@endsection
