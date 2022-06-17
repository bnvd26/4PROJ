@extends('layouts.app')

@section('content')

<body style="background-color:#adb5bd">
<div class="container">
    <div class="row justify-content-center">
        <h1>Nos Etudiants</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Campus</th>
                <th scope="col">Promotion</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr onclick="window.location='{{ route('students.show', ['student' => $student->id]) }}';" style="cursor:pointer" class="tr-hover">
                        <th scope="row">{{ $student->campus->location }}</th>
                        <th scope="row">{{ $student->promotion->year }}</th>
                        <th scope="row">{{ $student->user->first_name }}</th>
                        <th scope="row">{{ $student->user->last_name }}</th>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
</body>
@endsection

