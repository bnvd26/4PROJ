@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Index</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Location</th>
                <th scope="col">Adresse</th>
                <th scope="col">Code postal</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($campuses as $campus)
                    <tr>
                        <th scope="row">{{ $campus->location }}</th>
                        <td>{{ $campus->street_address }}</td>
                        <td>{{ $user->zipcode }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection

