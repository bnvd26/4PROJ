@extends('layouts.app')

@section('content')
<body style="background-color:teal">
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
                        <td>{{ $campus->zipcode }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
</body>
@endsection

