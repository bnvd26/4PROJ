@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Index</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->email }}</th>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->first_name }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection

