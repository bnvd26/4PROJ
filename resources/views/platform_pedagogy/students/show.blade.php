@extends('layouts.app')

@section('content')
    <style>
        svg {
            width: 30px;
        }
    </style>
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            <div class="col-xl-12 mb-5 mb-xl-0">
                <h2>Informations generales</h2>
                <p>Prénom : {{ $student->user->first_name }}</p>
                <p>Nom : {{ $student->user->last_name }}</p>

                <p>Alternance : {{ $student->internship ? 'Oui' : 'Non' }}</p>
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
            </div>
        </div>
    </div>

@endsection
