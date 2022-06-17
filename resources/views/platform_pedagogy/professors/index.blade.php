@extends('layouts.app')

@section('content')
<body style="background-color:#adb5bd">
<div class="container">
    <div class="row justify-content-center">
        <h1>Nos Intervenants</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Matière</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($professors as $professor)
                <tr onclick="window.location='{{ route('professors_campus.show', ['professors_campus' => $professor->id]) }}';" style="cursor:pointer" class="tr-hover">
                        <th scope="row">
                            {{ $professor->subject->name }}
                        </th>
                        <th scope="row">{{ $professor->last_name }}</th>
                        <td>{{ $professor->first_name }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
</body>

@endsection
