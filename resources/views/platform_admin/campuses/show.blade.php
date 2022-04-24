@extends('layouts.app')

@section('content')
    {{ $campus->id }}

    <h2>Promotions appartenant à ce campus</h2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Année</th>
            <th scope="col">Niveau d'étude</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($campus->promotions as $promotion)
                <tr>
                    <td>{{ $promotion->year }}</td>
                    <td>{{ config('app.degrees.' . $promotion->degree) }}</td>
                </tr>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($promotion->students as $student)
                        <tr>
                            <td>{{ $student->user->first_name }}</td>
                            <td>{{ $student->user->last_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </tbody>
      </table>

@endsection
