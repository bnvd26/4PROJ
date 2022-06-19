@extends('layouts.app')

@section('content')
    <div class="header pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <p>Nom : {{ $professor->last_name }}</p>
                    <p>Prénom : {{ $professor->first_name }}</p>
                    <p>Matière enseignée : {{ $professor->subject->name }}</p>
                    <p>Sur campus : </p>
                    <ul>
                        @foreach ($professor->campuses as $campus)
                            <li>{{ $campus->location }}</li>
                        @endforeach
                        <ul>
                </div>

                <p>Cours : {!! $professor->subject->course !!}</p>
            </div>
        </div>
    </div>
@endsection
