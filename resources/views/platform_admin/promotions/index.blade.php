@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Index</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Année</th>
                <th scope="col">Niveau d'étude</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->year }}</td>
                        <td>{{ $promotion->degree }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection

