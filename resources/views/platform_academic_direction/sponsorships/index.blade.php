@extends('layouts.app')

@section('content')
<body style="background-color:#adb5bd">
<div class="container">
    <div class="row justify-content-center">
        <h1>Nos Partenaires</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nom</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($sponsorships as $sponsorship)
                    <tr onclick="window.location='{{ route('sponsorships.show', ['sponsorship' => $sponsorship->id]) }}';" style="cursor:pointer" class="tr-hover">
                        <th scope="row">{{ $sponsorship->name }}</th>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
</body>
@endsection

