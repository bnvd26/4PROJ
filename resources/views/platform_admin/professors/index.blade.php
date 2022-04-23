@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Index</h1>
        <div class="col-sm-12">
            <a href="{{ route('professors.create') }}" class="btn btn-success">Ajouter un professeur</a>
        </div>
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
                    <tr>
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
@endsection

