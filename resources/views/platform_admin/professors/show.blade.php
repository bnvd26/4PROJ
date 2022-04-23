@extends('layouts.app')

@section('content')
<div class="container">
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
@endsection
<p>Cours : {!! $professor->subject->course !!}</p>
